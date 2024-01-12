<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\alert;


class ProductController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0',
            'sku' => 'required|numeric|min:0',
        ], [
            'price.min' => 'O preço não pode ser negativo.',
            'sku.min' => 'A quantidade não pode ser negativa.',
        ]);

        try {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $validatedData['price'];
        $product->sku = $validatedData['sku'];
        $product->category_id = $request->input('category_id');

        $product->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->store('public/images');

                $photo = new Photo();
                $photo->name = $imageName;
                $photo->path = $imagePath;
                $photo->product_id = $product->id;
                $photo->save();
            }
        }
            return redirect()->back()->with('success', 'Produto criado com sucesso!');
        } catch (\Exception $e) {

            return response('Erro ao criar produto', 500);
        }



    }


    public function show(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('home', compact('product'));
    }



    public function listProducts(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::all();
        return view('products.listTable', compact('product'));
    }





    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {

        $request->validate([
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|numeric|min:0',
        ],
            [
                'price.min' => 'O preço não pode ser negativo.',
                'sku.min' => 'A quantidade não pode ser negativa.',
            ]);

        if (!auth()->user()->is_admin) {
            return redirect()->back()->with('error', 'Você não tem permissão para atualizar produtos');
        }

        $product = Product::find($id);



        try {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->sku = $request->input('sku');
            $product->category_id = $request->input('category_id');

            $product->save();


            if ($request->hasFile('new_images')) {
            $images = $request->file('new_images');

            foreach ($images as $image) {
                $photo = new Photo();
                $photo->name = $image->getClientOriginalName();
                $photo->path = $image->store('public/images');
                $photo->product_id = $id;
                $photo->save();
            }
        }


            return redirect()->route('admin.home', ['product' => $product->id])->with('success', 'Produto atualizado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro: ' . $e->getMessage());

        }

    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'produto não encontrado');
        }

        $product->delete();

        return redirect()->back()->with('success', 'Produto excluído com sucesso');
    }


    public function showCategory(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category_id = $request->input('category_id');
        $category_name = '';

        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            $category = Category::find($category_id);
            $category_name = $category ? $category->name : '';
        } else {
            $products = Product::all();
        }

        return view('partials.category', [
            'products' => $products,
            'selectedCategoryId' => $category_id,
            'categoryName' => $category_name,
        ]);
    }







}
