<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function arcitles()
    {
        return $this->belongsToMany(Article::class, 'lf_evenement_a_lf_article', 'lf_id_article', 'lf_id_evenement');
    }

    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', ['evenements' => $evenements]);
    }

    public function create()
    {
        $evenements = Evenement::all();
        return view('evenements.create', ['evenements' => $evenements]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:255',
        ]);

        Evenement::create([
            'event' => $request->event  ,
        ]);

        return redirect()->route('evenements.index')->with('success', "La evenements a été créée avec succès !");
    }

    public function edit($id)
    {
        $evenements = Evenement::findOrFail($id);
        return view('evenements.edit', ['evenements' => $evenements]);
    }


    public function show($id)

    {
        $evenements = Evenement::findOrFail($id);
        return view('evenements.show', [
            'evenements' => $evenements
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'evenements' => 'required|string|max:255',
        ]);

        $evenements = Evenement::findOrFail($id);

        $evenements->event = $request->input('evenements');

        $evenements->save();

        return redirect()->route('evenements.index')->with('success', "La catégorie a été mise à jour avec succès !");
    }


    public function destroy($id)
    {
        Evenement::destroy($id);
        return redirect()->route('evenements.index')->with('success', "La evenements a été supprimée");
    }
}
