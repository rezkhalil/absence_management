<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.show.all.student') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Etudiant</a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.update.student',$etudiant->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="cin" class="block text-sm font-medium text-gray-700"> CIN </label>
                                <div class="mt-1">
                                  <input type="text" id="cin" name="cin" value="{{  old('cin',$etudiant->cin)  }}"  class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('cin') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                              </div>
                          <div class="sm:col-span-6">
                            <label for="nom" class="block text-sm font-medium text-gray-700"> NOM </label>
                            <div class="mt-1">
                              <input type="text" id="nom" name="nom" value="{{ $etudiant->nom_etu }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('nom') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="prenom" class="block text-sm font-medium text-gray-700"> PRENOM </label>
                            <div class="mt-1">
                              <input type="text" id="prenom" name="prenom"  value="{{ $etudiant->prenom_etu }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('prenom') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700"> Numero de Telephone </label>
                            <div class="mt-1">
                              <input type="text" id="phone" name="phone" value="{{ $etudiant->phone_etu }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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

                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Modifier</button>
                          </div>
                        </form>
                    </div>

                </div>

        </div>
    </div>
</x-admin-layout>
