<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center; font-size:25px">
            {{ __('Glavna stranica') }}
        </h2>
        <i class="fas fa-music"></i>
    </x-slot>
    <div class="py-12" style="background-color:#009900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="background-color:#99ff99">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4" style="text-align:center; font-size:25px">Lista pesama</div>
                    <div>
                        <a href="/song" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Dodaj novu pesmu</a>
                    </div>
                </div>
                <table class=" w-full text-md rounded mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5" style="text-align:center">Naziv pesme</th>
                            <th class="text-left p-3 px-5" style="text-align:center">Izvodjac</th>
                            <th class="text-left p-3 px-S" style="text-align:end">Akcije</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(auth()->user()->songs as $song)
                        <tr class="border-b hover: bg-orange-100">
                            <td class="p-3 px-5" style="text-align:center">
                                {{$song->song_name}}
                            </td>
                            <td class="p-3 px-5" style="text-align:center">
                                {{$song->artist}}
                            </td>
                            <td class="p-3 px-5" style="display: flex; justify-content: flex-end">
                                <a href="/song/{{$song->id}}" name="edit" class="mr-3 text-sm bg-green-700 hover:bg-green-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" style="text-align:end">Izmeni</a>
                                <form action=" /song/{{$song->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Obrisi</button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>