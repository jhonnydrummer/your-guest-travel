<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
       $request->validate([
           'image'=> 'required|image|mimes:jpg,png,jpeg,gif, svg|max:2048',
       ]);

       $name = $request->file('image')->getClientOriginalName();
       $request->file('image')->store('public/images');

       $picture = new Photo;
       $picture->name = $name;
       $picture->path = $request->file('image')->hashName();
       $picture->save();
       return redirect()->back()->with('status', 'Upload bem sucedido');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $picture = Photo::find($id);

        if ($picture) {
            // Excluir o arquivo do armazenamento
            Storage::delete('public/images/'.$picture->path);

            // Excluir o registro do banco de dados
            $picture->delete();

            return redirect()->back()->with('status', 'Imagem excluída com sucesso');
        } else {
            return redirect()->back()->with('error', 'Imagem não encontrada');
        }
    }
}
