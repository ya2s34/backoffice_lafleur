<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Liste de toutes les couleurs') }}
                    </h2>
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Action</th>
                            <th> <x-cree_btn :route="route('couleurs.create')" /></th>

                        </thead>

                        <ul>
                            @foreach($couleurs as $couleurs)
                            <tr>
                                <td class="px-6 py-4">{{$couleurs->id_couleur}}</td>
                                <td class="px-6 py-4">{{$couleurs->couleur}}</td>
                                <td class="px-6 py-4">



                                    <a href="{{route('couleurs.edit',$couleurs->id_couleur)}}"><x-modifier_btn></x-modifier_btn></a>


                                    <a href="{{route('couleurs.show',$couleurs->id_couleur)}}"><x-voir_btn></x-voir_btn></a>

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