<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Liste de toutes les catégories') }}
                    </h2>
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Action</th>
                            <th> <x-cree_btn :route="route('categories.create')" /></th>

                        </thead>

                        <ul>
                            @foreach($categories as $categorie)
                            <tr>
                                <td class="px-6 py-4">{{$categorie->id_categorie}}</td>
                                <td class="px-6 py-4">{{$categorie->nom_categorie}}</td>
                                <td class="px-6 py-4">



                                    <a href="{{route('categories.edit',$categorie->id_categorie)}}"><x-modifier_btn></x-modifier_btn></a>


                                    <a href="{{route('categories.show',$categorie->id_categorie)}}"><x-voir_btn></x-voir_btn></a>

                                </td>
                            </tr>



                            @endforeach
                    </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>