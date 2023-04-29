<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('couleurs.index')}}"><x-retour_btn></x-retour_btn></a>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('couleurs.update', $couleurs->id_couleur)}}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="couleur" class="block font-bold text-blue-800 text-lg">Titre</label>
                                <input class="w-full" id="couleur" name="couleur" type="text" value="{{$couleurs->couleur}}">
                                @error('couleur')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                            </div>
                           

                        </div>
                        <div>
                            <button type="submit"><x-save_btn></x-save_btn></button>
                            <a href="{{route('couleurs.index')}}"><x-annule_btn></x-annule_btn></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>