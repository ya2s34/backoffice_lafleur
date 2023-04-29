<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-5">Détails d'un article</h2>
                    <div class="overflow-hidden
                                shadow-sm
                                rounded-lg
                                mb-11
                             ">
                        <div class="mb-5">
                            <span class="font-bold mr-2">Titre :</span>{{$article->nom_article}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Prix :</span>{{$article->prix}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Quantité :</span>{{$article->quantite_stock}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Date d'inventaire :</span>{{$article->date_inventaire}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Poids :</span>{{$article->poid}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Taille :</span>{{$article->taille}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Couleur :</span>{{$couleur->couleur}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Image :</span>{{$article->image}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Description :</span>{{$article->description}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Catégorie :</span>{{$categorie->nom_categorie}}
                        </div>
                        <div class="mb-5">
                            <span class="font-bold mr-2">Événements :</span>
                            @foreach($article->evenements as $evenement)
                            <span class="mr-2">{{$evenement->event}}</span>
                            @endforeach
                        </div>

                    </div>
                    <a href="{{route('articles.index')}}"><x-retour_btn></x-retour_btn></a>
                    <a href="{{route('articles.edit', $article->id_article)}}"><x-modifier_btn></x-modifier_btn></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>