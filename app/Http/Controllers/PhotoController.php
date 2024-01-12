<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Garante que o product_id existe na tabela de produtos
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        $product_id = $request->input('product_id');

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $photo = new Photo();
                $photo->name = $image->getClientOriginalName();
                $photo->path = $image->store('public/images');
                $photo->product_id = $product_id;
                $photo->save();
            }
        }

        return redirect()->back()->with('status', 'Upload bem sucedido');
    }


    public function destroyi(Photo $photo): \Illuminate\Http\RedirectResponse
    {

        $photo->delete();

        return redirect()->back()->with('success', 'Foto excluída com sucesso');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $photo = Photo::find($id);
        if ($photo) {
            $photo->delete();

        }
        return redirect()->route('admin.home')
            ->with('success', 'Foto excluída com sucesso.');

    }


}

