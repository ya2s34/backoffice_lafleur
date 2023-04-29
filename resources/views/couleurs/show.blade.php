<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-5">Détails d'une catégorie</h2>
                    <div class="overflow-hidden
                                shadow-sm
                                rounded-lg
                                mb-11
                             ">
                        <div class="mb-5">
                            <span class="font-bold mr-2">Titre :</span>{{$couleurs->couleur}}
                        </div>
                        <a href="{{route('couleurs.index')}}"><x-retour_btn></x-retour_btn></a>
                        <a href="{{route('couleurs.edit', $couleurs->id_couleur)}}"><x-modifier_btn></x-modifier_btn></a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>