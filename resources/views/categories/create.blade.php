<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100  w-40 mb-8">
                    <form action="{{route('categories.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <label for="txt">Titre</label>
                        <input class="mb-8" id="txt" name="nom_categorie" type="text">
                        @error('nom_categorie')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror

                        <button type="submit"><x-save_btn></x-save_btn></button>
                        <a href="{{route('categories.index')}}"><x-annule_btn></x-annule_btn></a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>