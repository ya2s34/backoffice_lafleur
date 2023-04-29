<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();

        return view('categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_categorie' => 'required|string|max:45',
        ]);

        $categories = new Categorie([
            'nom_categorie' => $request->nom_categorie,
        ]);
        $categories->save();


        return redirect()->route('categories.index')->with('success', "La catégorie a été créée avec succès !");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $categories = Categorie::find($id);
        return view('categories.show', [
            'categories' => $categories
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::findOrFail($id);
        return view('categories.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);

        $categories = Categorie::findOrFail($id);

        $nom_categorie = $request->input('nom_categorie');
        $categories->nom_categorie = $nom_categorie;

        $categories->save();

        return redirect()->route('categories.index')->with('success', "La catégorie a été mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('categories.index')->with('success', "La catégorie a été supprimée avec succès !");
    }
}
