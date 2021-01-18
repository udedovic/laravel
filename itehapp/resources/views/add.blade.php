<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center; font-size:25px">
            {{ __('Dodaj pesmu') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background-color:#009900">
        <div class="max-w-7xl mx-auto sm:px-6 1g:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="background-color:#99ff99">
                <form method="POST" action="/song">
                    <div style="display:flex; justify-content:space-between">
                        <div class="form-group">
                            <label for="">Naziv pesme :</label>
                            <input type="text" autocomplete="off" name="song_name" class="bg-gray-100 rounded border border-gray-460 leading-normal py-2 px-3" />
                            @if ($errors->has('song_name'))
                            <span class="text-danger">{{ $errors->first('song_name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Izvodjac :</label>
                            <input type="text" name="artist" autocomplete="off" class="bg-gray-100 rounded border border-gray-460 leading-normal py-2 px-3" />
                            @if ($errors->has('artist'))
                            <span class="text-danger">{{ $errors->first('artist') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="text-align:center">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Dodaj</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>