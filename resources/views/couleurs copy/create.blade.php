<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-40 mb-8">
                    <form action="{{route('evenements.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <label for="txt">Titre</label>
                        <input class="mb-8" id="txt" name="event" type="text">
                        @error('event')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror

                        <button type="submit"><x-save_btn></x-save_btn></button>
                        <a href="{{route('evenements.index')}}"><x-annule_btn></x-annule_btn></a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>