<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.show.all.matiere') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Retour</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.save.matiere') }}">
                            @csrf

                            <div class="sm:col-span-6">
                                <label for="nom" class="block text-sm font-medium text-gray-700"> NOM </label>
                                <div class="mt-1">
                                  <input type="text" id="nom" name="nom" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('nom') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                              </div>
                              <div class="sm:col-span-6">
                                <label for="filiere" class="block text-sm font-medium text-gray-700">Filiere</label>
                                <select id="filiere" name="filiere" autocomplete="filiere" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($filieres as $filiere)
                                    <option value="{{$filiere->id}}">{{$filiere->nom_filiere }}</option>
                                     @endforeach
                                </select>
                            @error('filiere') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="prof" class="block text-sm font-medium text-gray-700">prof</label>
                                <select id="prof" name="prof" autocomplete="prof" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($profs as $prof)
                                    <option value="{{$prof->id}}">{{$prof->nom_ens}}</option>
                                     @endforeach
                                </select>
                            @error('prof') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="semestre" class="block text-sm font-medium text-gray-700">semestre</label>
                                <select id="semestre" name="semestre" autocomplete="semestre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($semestres as $semestre)
                                    <option value="{{$semestre->id}}">{{$semestre->nom_sem}}</option>
                                     @endforeach
                                </select>
                            @error('semestre') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Ajouter</button>
                          </div>
                        </form>
                      </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
