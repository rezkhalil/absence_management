<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.add.matiere') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Ajouter Matiére</a>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Filiere</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prof</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">étudiants</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($matieres as $matiere)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$matiere->nom_mat}}
                                </div>
                                </td><td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{$matiere->filieremat->nom_filiere}}
                                    </div>
                                    </td><td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{$matiere->enseignantMatiere->nom_ens}}
                                        </div>
                                        </td><td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{$matiere->semestre->nom_sem}}
                                            </div>
                                            </td>
                                <td>
                                   <div class="flex justify-end">
                                       <div class="flex space-x-2">
                                        <a href="{{ route('admin.edit.matiere',$matiere->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.delete.matiere',$matiere->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                         </form>                                       </div>
                                   </div>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
