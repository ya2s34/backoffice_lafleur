<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\Couleur;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Europe/Paris');

class ArticleController extends Controller
{
    public function evenements()
    {
        return $this->belongsToMany(Evenement::class, 'lf_evenement_a_lf_article', 'lf_id_article', 'lf_id_evenement');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $evenements = Evenement::all();
        return view('articles.create', ['articles' => $articles, 'evenements' => $evenements, 'couleurs' => $couleurs, 'categories' => $categories]);
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

            'evenement.*' => 'exists:evenement,id_evenement',
            'nom_article' => 'required|string|max:45|min:2',
            'prix' => 'required|bail|numeric|min:0.01|max:9999',
            'quantite_stock' => 'required|int',
            'poid' => 'nullable|bail|numeric|max:9999',
            'date_inventaire' => 'required|date',
            'taille' => 'nullable|integer',
            'id_couleur' => 'required|int',
            'image' => 'required|string|max:45',
            'description' => 'required|string|max:150',
            'id_categorie' => 'required|int'

        ]);

        $article = new Article([
            'nom_article' => $request->nom_article,
            'prix' => $request->prix,
            'quantite_stock' => $request->quantite_stock,
            'date_inventaire' => $request->date_inventaire,
            'poid' => $request->poid,
            'taille' => $request->taille,
            'id_couleur' => $request->id_couleur,
            'image' => $request->image,
            'description' => $request->description,
            'id_categorie' => $request->id_categorie,
        ]);
        
        
        $article->save();
        if ($request->evenements) {
            $article->evenements()->attach($request->evenements);
        }

        return redirect()->route('articles.index')->with('success', "L'article a été créé avec succès !");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $couleur = Couleur::find($article->id_couleur);
        $categorie = Categorie::find($article->id_categorie);

        return view('articles.show', [
            'article' => $article,
            'couleur' => $couleur,
            'categorie' => $categorie
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
        $articles = Article::find($id);
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $evenements = Evenement::all();
        $article_evenements = $articles->evenements->pluck('id_evenement')->toArray();


        return view('articles.edit', ['id_article' => $id, 'articles' => $articles, 'couleurs' => $couleurs, 'evenements' => $evenements, 'categories' => $categories, 'article_evenements' => $article_evenements]);
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
            'evenement.*' => 'exists:evenement,id_evenement',

            'nom_article' => 'required|string|max:45|min:2',
            'prix' => 'required|bail|numeric|min:0.01|max:9999',
            'quantite_stock' => 'required|int',
            'poid' => 'nullable|bail|numeric|min:0.01|max:9999',

            'taille' => 'nullable|integer',
            'id_couleur' => 'required|int',
            'image' => 'required|string|max:45',
            'description' => 'required|string|max:150',
            'id_categorie' => 'required|int'
        ]);

        $articles = Article::find($id);
        $prix = $request->input('prix');
        $articles->prix = $prix;

        $quantite_stock = $request->input('quantite_stock');
        $articles->quantite_stock = $quantite_stock;

        $poid = $request->input('poid');
        $articles->poid = $poid;

        $taille = $request->input('taille');
        $articles->taille = $taille;

        $id_couleur = $request->input('id_couleur');
        $articles->id_couleur = $id_couleur;

        $nom_article = $request->input('nom_article');
        $articles->nom_article = $nom_article;

        $image = $request->input('image');
        $articles->image = $image;

        $description = $request->input('description');
        $articles->description = $description;

        $id_categorie = $request->input('id_categorie');
        $articles->id_categorie = $id_categorie;

        $articles->save();

        if ($request->evenements) {
            $articles->evenements()->sync($request->evenements);
        } else {
            $articles->evenements()->detach();
        }
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(string $id)
    {
        // Supprimer les relations dans la table enfant
        DB::table('lf_evenement_a_lf_article')->where('lf_id_article', $id)->delete();

        // Supprimer l'article dans la table parent
        Article::destroy($id);

        return redirect()->route('articles.index')->with('success', "L'article a été supprimé avec succès !");
    }
}
