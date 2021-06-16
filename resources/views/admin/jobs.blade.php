@extends('admin/layout')

@section('main')

<div class="w-2/12 p-4 bg-white bg-opacity-90 mt-4 flex flex-wrap">
  <div class="w-full">
    <button onclick="deleteItems()" class="w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Supprimer
    </button>
    <button onclick="deleteItems()" class="mt-4 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Curriculum
    </button>
    <button onclick="deleteItems()" class="mt-4 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Lettre
    </button>
  </div>
  <form method="GET" action="/jobs" class="mt-4 flex-col">
  <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Option
      </label>
      <select id="Option" class="mt-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Option">
          <option selected value="AND">AND</option>
          <option value="OR">OR</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold">
        Année d’expérience
      </label>
      <select id="AE" class="mt-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Années_expérience">
        <option selected hidden value="null"></option>
        <option value="Dédutant">Dédutant</option>
        <option value="Moins de 1 an">Moins de 1 an</option>
        <option value="De 1 à 3 ans">De 1 à 3 ans</option>
        <option value="De 3 à 5 ans">De 3 à 5 ans</option>
        <option value="De 5 à 10 ans">De 5 à 10 ans</option>
        <option value="Plus de 10 ans">Plus de 10 ans</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Niveau d’étude
      </label>
      <select id="NE" class="mt-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_étude">
          <option selected hidden value="null"></option>
          <option value="Qualification avant Bac">Qualification avant Bac</option>
          <option value="Bac">Bac</option>
          <option value="Bac+2">Bac+2</option>
          <option value="Bac+3/4">Bac+3/4</option>
          <option value="Bac+5 et plus">Bac+5 et plus</option>
      </select>
    </div>
    
    <button id="submitFilter" class="mt-4 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Filter
    </button>
  </form> 
</div>

<div class="w-10/12 ml-4 mr-4 mt-4 flex flex-col">
  <div class="overflow-x-scroll max-w-full">
    <div class="align-middle inline-block">
      <div class="shadow overflow-hidden border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-200">
            <tr>
              <th><input class="checkboxes" onchange="addAll(this)" type="checkbox"></th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Id
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Curriculum
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lettre
              </th>
              
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Créer
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Poste
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Direction
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Département
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom & Prénom
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Adresse mail
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Téléphone
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Adresse
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ville
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Sexe
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date de naissance
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Niveau d'études
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Etablissement de formation
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Années d'expérience
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Motivation
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($data as $row )
            <tr>
                <td><input id="checkbox-{{$row->id}}" onchange="addId({{$row->id}},this)" type="checkbox"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->created_at}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Poste}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Direction}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Département}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Nom_Prenom}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Adresse_mail}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Téléphone}}
                </td>
                <td class="max-w-sm overflow-hidden px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Adresse}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Ville}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Sexe}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Date_de_naissance}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Niveau_étude}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Etablissement_de_formation}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Années_expérience}}
                </td>
                <td class="max-w-sm overflow-hidden px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Motivation}}
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
    let checkedIds = [];
    function addId(id,checkbox){
        if(checkbox.checked == true){
            checkedIds.push(id);            
        }
        else{
            const index = checkedIds.indexOf(id);
            if (index > -1) {
                checkedIds.splice(index, 1);
                
            }
        }
        console.log(checkedIds);
    }

    function addAll(checkbox){
        let identifier;
        if(checkbox.checked == true){
        @foreach ($data as $row )
        identifier = {{$row->id}}
            if(checkedIds.indexOf(identifier) == -1){
                checkedIds.push(identifier);
                document.getElementById("checkbox-"+identifier).checked = true;
            }
        @endforeach
        }
        else{
        let index;
        @foreach ($data as $row )
        identifier = {{$row->id}}
        index = checkedIds.indexOf(identifier);
            if(index > -1){
                checkedIds.splice(index,1);
                document.getElementById("checkbox-"+identifier).checked = false;
            }
        @endforeach
        }
        console.log(checkedIds);
    }
    function deleteItems(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", '/api/deleteJobApplications', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(
            checkedIds
        ));
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                if(this.responseText>0){
                    location.reload();
                }
            }
        };
        console.log(checkedIds);
    }
    window.onload = ()=>{
    let sf = document.getElementById("submitFilter");
    document.addEventListener("submit",()=>{
      let AE = document.getElementById("AE");
      let NE = document.getElementById("NE");
        if(AE.value == 'null'){
          AE.name = "";
        }
        if(NE.value == 'null'){
          NE.name = "";
        }
    })
    }
    
    {{-- function filter(){
      let AE = document.getElementById("AE").value;
      let NE = document.getElementById("NE").value;
      let data = [AE,NE];
      var xhr = new XMLHttpRequest();
        xhr.open("POST", '/api/filter', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(
            data
        ));
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                if(this.responseText>0){
                    location.reload();
                }
            }
        };
    } --}}
</script>