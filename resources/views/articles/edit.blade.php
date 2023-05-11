<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('articles.index')}}"><x-retour_btn></x-retour_btn></a>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('articles.update', $articles->id_article)}}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="nom_article" class="block font-bold text-blue-800 text-lg">Titre</label>
                                <input class="w-full" id="nom_article" name="nom_article" type="text" value="{{$articles->nom_article}}">
                                @error('nom_article')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="prix" class="block font-bold text-blue-800 text-lg">Prix</label>
                                <input class="w-full" id="prix" name="prix" type="text" value="{{$articles->prix}}">
                                @error('prix')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="quantite_stock" class="block font-bold text-blue-800 text-lg">Quantité en stock</label>
                                <input class="w-full" id="quantite_stock" name="quantite_stock" type="text" value="{{$articles->quantite_stock}}">
                                @error('quantite_stock')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="poid" class="block font-bold text-blue-800 text-lg">Poids</label>
                                <input class="w-full" id="poid" name="poid" type="text" value="{{$articles->poid}}">
                                @error('poid')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="taille" class="block font-bold text-blue-800 text-lg">Taille</label>
                                <input class="w-full" id="taille" name="taille" type="text" value="{{$articles->taille}}">
                                @error('taille')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="block font-bold text-blue-800 text-lg">Description</label>
                                <input class="w-full" id="description" name="description" type="text" value="{{$articles->description}}">
                                @error('description')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="image" class="block font-bold text-blue-800 text-lg">Image</label>
                                <input class="w-full" id="image" name="image" type="text" value="{{$articles->image}}">
                                @error('image')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="grid gap-4">
                                <label class="font-bold text-blue-800 text-lg" for="id_couleur">Couleur</label>
                                <select class="mb-8" id="id_couleur" name="id_couleur">
                                    @foreach($couleurs as $couleur)
                                    <option value="{{$couleur->id_couleur}}" {{$articles->id_couleur == $couleur->id_couleur ? 'selected' : ''}}>{{$couleur->couleur}}</option>
                                    @endforeach


                                </select>

                            </div>

                            <div>
                                <label class="font-bold text-blue-800 text-lg" for="date_inventaire">Date inventaire</label>
                                <input class="mb-8" type="datetime-local" id="date_inventaire" name="date_inventaire" value="{{ date('Y-m-d\TH:i:s') }}" readonly>
                                @error('date_inventaire')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="grid gap-4">
                                <label class="font-bold text-blue-800 text-lg" for="id_categorie">Catégorie</label>
                                <select class="mb-8" id="id_categorie" name="id_categorie">
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id_categorie}}" {{$articles->id_categorie == $categorie->id_categorie ? 'selected' : ''}}>{{$categorie->nom_categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class=" mr-2 font-bold text-blue-800 text-lg" for="evenements">Événements </label>
                                @foreach($evenements as $evenement)
                                <input class="ml-8" type="checkbox" name="evenements[]" value="{{ $evenement->id_evenement }}" {{ in_array($evenement->id_evenement, $article_evenements) ? 'checked' : '' }}>{{ $evenement->event }}
                                @endforeach

                            </div>

                            <div>
                                <button type="submit"><x-save_btn></x-save_btn></button>
                                <a href="{{route('articles.index')}}"><x-annule_btn></x-annule_btn></a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>