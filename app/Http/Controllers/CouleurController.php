<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleurs.index', ['couleurs' => $couleurs]);
    }

    public function create()
    {
        $couleurs = Couleur::all();

        return view('couleurs.create', ['couleurs'=>$couleurs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'couleur' => 'required|string|max:255',
        ]);

        Couleur::create([
            'couleur' => $request->couleur,
        ]);

        return redirect()->route('couleurs.index')->with('success', "La couleur a été créée avec succès !");
    }

    public function edit($id)
    {
        $couleurs = Couleur::findOrFail($id);
        return view('couleurs.edit', ['couleurs' => $couleurs]);
    }

    public function show($id)

    {
        $couleurs = Couleur::findOrFail($id);
        return view('couleurs.show', [
            'couleurs' => $couleurs
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'couleur' => 'required|string|max:255',
        ]);

        $couleurs = Couleur::findOrFail($id);

        $couleur = $request->input('couleur');
        $couleurs->couleur = $couleur;

        $couleurs->save();

        return redirect()->route('couleurs.index')->with('success', "La catégorie a été mise à jour avec succès !");
    }


    public function destroy($id)
    {
        Couleur::destroy($id);
        return redirect()->route('couleurs.index')->with('success', "La couleur a été supprimée");
    }
}
