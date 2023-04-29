<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('articles.store')}}" method="POST" class="space-y-4">
                        @method('POST')
                        @csrf
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Titre</label>
                                <input class="w-full mb-8" id="txt" name="nom_article" type="text">
                                @error('nom_article')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Prix</label>
                                <input class="w-full mb-8" id="txt" name="prix" type="text">
                                @error('prix')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Quantite stock</label>
                                <input class="w-full mb-8" id="txt" name="quantite_stock" type="text">
                                @error('quantite_stock')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Poid</label>
                                <input class="w-full mb-8" id="txt" name="poid" type="text">
                                @error('poid')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Taille</label>
                                <input class="w-full mb-8" id="txt" name="taille" type="text">
                                @error('taille')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Description</label>
                                <input class="w-full mb-8" id="txt" name="description" type="text">
                                @error('description')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="txt" class="block font-bold text-blue-800 text-lg">Image</label>
                                <input class="w-full mb-8" id="txt" name="image" type="text">
                                @error('image')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="date_inventaire" class="block font-bold text-blue-800 text-lg">Date inventaire</label>
                                <input class="w-full mb-8" type="datetime-local" id="date_inventaire" name="date_inventaire" value="{{ date('Y-m-d\TH:i:s') }}" readonly>
                                @error('date_inventaire')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="grid gap-4">
                                <label class="font-bold text-blue-800 text-lg" for="id_couleur">Couleur</label>
                                <select class="mb-8" id="id_couleur" name="id_couleur">
                                    @foreach($couleurs as $couleur)
                                    <option value="{{$couleur->id_couleur}}" {{$couleur->id_couleur == $couleur->id ? 'selected' : ''}}>{{$couleur->couleur}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid gap-4">
                                <label class="font-bold text-blue-800 text-lg" for="id_categorie">Catégorie</label>
                                <select class="mb-8" id="id_categorie" name="id_categorie">
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id_categorie}}" {{old('id_categorie') == $categorie->id_categorie ? 'selected' : ''}}>{{$categorie->nom_categorie}}</option>
                                    @endforeach
                                </select>
                                @error('id_categorie')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="mr-2 font-bold text-blue-800 text-lg" for="evenements">Événements</label>
                                @foreach($evenements as $evenement)
                                <input class="ml-8" type="checkbox" name="evenements[]" value="{{$evenement->id_evenement}}">{{$evenement->event}}
                                @endforeach
                                @error('id_evenement')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"><x-save_btn></x-save_btn></button>
                                <a href="{{route('articles.index')}}"><x-annule_btn></x-annule_btn></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>