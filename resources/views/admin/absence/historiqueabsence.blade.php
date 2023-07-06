<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
      <div class="row">
        <div class="col-md-4">
            <select class="form-control px-4 py-2 bg-gray-300	 rounded-md" id="matiereDropdown">
                <option value="All">All Matiere</option>
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere -> nom_mat }}">{{ $matiere -> nom_mat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control px-4 py-2 bg-gray-300   rounded-md" id="filiereDropdown">
                <option value="All">All</option>
                @foreach ($filiere as $filiere)
                <option value="{{ $filiere -> nom_filiere }}">{{ $filiere -> nom_filiere }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <input type="date" class="form-control px-4 py-2 bg-gray-300	  hover:bg-slate-400 rounded-md" id="dateDropdown">
        </div>

    </div>
    <br>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">etat</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Etudiant(e)</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Debut</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matiere</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Filiere</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">étudiants</span>
                </th>
          </tr>

        </thead>


        <tbody id="download-forms-table-tbody" class="bg-white divide-y divide-gray-200">
          @isset($absence)
          <tr>
          @foreach($absence as $key=>$abs)

          @foreach($abs as $a)
           @if($a->etat == 1)
           <td class="px-6 py-4 whitespace-nowrap" >Absent(e)</td>
           @else
           <td class="px-6 py-4 whitespace-nowrap">Present(e)</td>
@endif
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->etudiantabs['nom_etu']}}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs['date'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs['heure_debut'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs['heure_fin'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs['type'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs->seancematiere['nom_mat'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs->seancematiere->filieremat['nom_filiere'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $a->seanceabs->seancematiere->semestre['nom_sem'] }}</td>
        </tr>

          @endforeach
          @endforeach
          @endisset
        </tbody>
      </table>


    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
       //Filtering region dropdown
       $('body').on("change", '#matiereDropdown', function() {
        var filter, table, tr, td, i;
        filter = $(this).val();
        table = document.getElementById("download-forms-table-tbody");
        tr = table.getElementsByTagName("tr");

        if (filter == "All") {
            // Loop through all table rows, and show anyrows that is hidden
            for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "";

            }
        } else {
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (td) {
                    if (td.innerHTML.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                } else {
                    var a = "No Records Found!!!";
                }
            }
        }
    });

    //Filtering filiere dropdown
    $('body').on("change", '#filiereDropdown', function() {
        var filter, table, tr, td, i;
        var matiereval = $('#matiereDropdown :selected').val();
        filter = $(this).val();
        table = document.getElementById("download-forms-table-tbody");
        tr = table.getElementsByTagName("tr");
        if (filter == "All") {
            // Loop through all table rows, and show anyrows that is hidden
            for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
            }
        } else {
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                var td1 = '';
                if (matiereval != 'All') {
                    td1 = tr[i].getElementsByTagName("td")[6];
                    console.log(td1)
                }
                td = tr[i].getElementsByTagName("td")[7];
                console.log('td1' + td1)
                if (td) {
                    if (td.innerHTML.indexOf(filter) > -1) {
                        if (td1 != '') {
                            if (td1.innerHTML.indexOf(matiereval) > -1) {
                                tr[i].style.display = "";
                            } else {

                                tr[i].style.display = "none";
                            }
                        }
                        if (td1 == '') {
                            tr[i].style.display = "";
                        }
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    });

    //Show active inactive users

    $('body').on("change", '#dateDropdown', function() {
                var filter, table, tr, td, i;
                filter = $(this).val();
                table = document.getElementById("download-forms-table-tbody");
                tr = table.getElementsByTagName("tr");
                var matiereval = $('#matiereDropdown :selected').val();
                var filiereval = $('#filiereDropdown :selected').val();
                if (filter == "All") {
                    // Loop through all table rows, and show anyrows that is hidden
                    for (i = 0; i < tr.length; i++) {
                        tr[i].style.display = "";
                    }
                } else {
                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];

                    var td1 = '';
                    if (matiereval != 'All') {
                        td1 = tr[i].getElementsByTagName("td")[6];
                    }

                    var td2 = '';
                    if (filiereval != 'All') {
                        td2 = tr[i].getElementsByTagName("td")[7];
                    }
                        if (td) {
                            if (td.innerHTML.indexOf(filter) > -1) {
                                if (td1 != '') {
                                    if (td1.innerHTML.indexOf(matiereval) > -1) {
                                        tr[i].style.display = "";
                                    } else {

                                        tr[i].style.display = "none";
                                    }
                                }
                                    if (td2 != '') {
                                        if (td2.innerHTML.indexOf(filiereval) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                    if (td1 == '' || td2 == '') {
                                        tr[i].style.display = "";
                                    }
                                } else {
                                    tr[i].style.display = "none";
                                }
                            } else {
                                var a = "No Records Found!!!";
                            }
                        }
                    }
                });
</script>
</x-admin-layout>
