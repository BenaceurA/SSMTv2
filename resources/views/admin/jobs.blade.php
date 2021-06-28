@extends('admin/layout',['username' => $username])

@section('main')

<div class="small-width text-sm mt-4 ml-4 ">
<div class = "bg-white p-4 bg-opacity-90 border-t-4 border-b-4 rounded mb-4">
  <div class="w-full">
    <button onclick="deleteItems()" class=" w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Supprimer
    </button>
    <button onclick="DownloadCVs()" class="mt-4 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Curriculum vitae
    </button>
    <button onclick="DownloadLetters()" class="mt-4 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Lettre de motivation
    </button>
  </div>
  <form method="GET" action="/jobs" class="m-0 flex-col">
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Option
      </label>
      <select id="Option" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Option">
          <option selected value="AND">AND</option>
          <option value="OR">OR</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold">
        Année d’expérience
      </label>
      <select id="AE" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Années_expérience">
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
      <select id="NE" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_étude">
          <option selected hidden value="null"></option>
          <option value="Qualification avant Bac">Qualification avant Bac</option>
          <option value="Bac">Bac</option>
          <option value="Bac+2">Bac+2</option>
          <option value="Bac+3/4">Bac+3/4</option>
          <option value="Bac+5 et plus">Bac+5 et plus</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Sexe
      </label>
      <select id="Sexe" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Sexe">
          <option selected hidden value="null"></option>
          <option value="Masculin">Masculin</option>
          <option value="Féminin">Féminin</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Ville
      </label>
      <select id="Ville" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ville">
          <option selected hidden value="null"></option>
          <option value="Agadir">Agadir</option>
          <option value="Asilah">Asilah</option>
          <option value="Béni Mellal">Béni Mellal</option>
          <option value="Casablanca">Casablanca</option>
          <option value="Chefchaouen">Chefchaouen</option>
          <option value="El Jadida">El Jadida</option>
          <option value="El hoceima">El hoceima</option>
          <option value="El Kelâa des Sraghna">El Kelâa des Sraghna</option>
          <option value="Fès">Fès</option>
          <option value="Khénifra">Khénifra</option>
          <option value="Khémisset">Khémisset</option>
          <option value="Kénitra">Kénitra</option>
          <option value="Khouribga">Khouribga</option>
          <option value="Laâyoune">Laâyoune</option>
          <option value="Marrakech">Marrakech</option>
          <option value="Meknès">Meknès</option>
          <option value="Mohammédia">Mohammédia</option>
          <option value="Nador">Nador</option>
          <option value="Oujda">Oujda</option>
          <option value="Rabat">Rabat</option>
          <option value="Safi">Safi</option>
          <option value="Salé">Salé</option>
          <option value="Taroudant">Taroudant</option>
          <option value="Tiznit">Tiznit</option>
          <option value="Taza">Taza</option>
          <option value="Témara">Témara</option>
          <option value="Tanger">Tanger</option>
          <option value="Tétouan">Tétouan</option>
      </select>
    </div>
    <div class="mt-4 flex-col w-auto">
      <label class="whitespace-nowrap text-gray-500 font-bold ">
        Age
      </label>
      <select id="Age" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Date_de_naissance">
          <option selected hidden value="null"></option>
          <option value="18-22">18-22</option>
          <option value="23-27">23-27</option>
          <option value="28-32">28-32</option>
          <option value="33-37">33-37</option>
          <option value="38-42">38-42</option>
          <option value="42+">42+</option>     
      </select>
    </div>
    <button id="submitFilter" class="mt-4 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
      Filter
    </button>
  </form>
</div>
</div>

<div class="big-width ml-4 mr-4 mt-4 flex flex-col">
  <div class="overflow-x-scroll max-w-full  border-b-4 rounded mb-4">
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
                <td><input id="checkbox-{{$row->id}}" onchange="addId({{$row->id}},@if($row->Lettre_motivation)'{{$row->Lettre_motivation}}'@else null @endif,this)" type="checkbox"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button onclick="DownloadCV({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @if($row->Lettre_motivation)
                    <button onclick="DownloadLetter({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                    @else
                    <span></span>
                    @endif
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
    function addId(id,lettre,checkbox){
        if(checkbox.checked == true){
          let obj={};
          obj["id"] = id;
          obj["lettre"] = lettre;
            checkedIds.push(obj);            
        }
        else{
          checkedIds = checkedIds.filter( el => el.id !== id );
        }
        console.log(checkedIds);
    }

    function addAll(checkbox){
        let identifier;
        if(checkbox.checked == true){
          let obj={};
        @foreach ($data as $row )
        obj = {};
        obj["id"] = {{$row->id}}
        obj["lettre"] = @if($row->Lettre_motivation)"{{$row->Lettre_motivation}}"@else null @endif;
            if(!checkedIds.some(obj => obj.id === {{$row->id}})){
                checkedIds.push(obj);
                document.getElementById("checkbox-"+obj["id"]).checked = true;
            }
        @endforeach
        }
        else{
        let index;
        @foreach ($data as $row )
        identifier = {{$row->id}}
        checkedIds = checkedIds.filter( el => 
          {
            let result = el.id !== identifier
            if(!result) document.getElementById("checkbox-"+identifier).checked = false;
            return result;
          }
        );
        @endforeach
        }
        console.log(checkedIds);
    }

    function deleteItems(){
        //retrieve only the ids from checkedIds (disgard letter)
        let ids = [];
        checkedIds.forEach(obj=>{
          ids.push(obj.id);
        })

        var xhr = new XMLHttpRequest();
        xhr.open("POST", '/api/deleteJobApplications', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(
            ids
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
      let Sexe = document.getElementById("Sexe");
      let Ville = document.getElementById("Ville");
        if(AE.value == 'null'){
          AE.name = "";
        }
        if(NE.value == 'null'){
          NE.name = "";
        }
        if(Sexe.value == 'null'){
          Sexe.name = "";
        }
        if(Ville.value == 'null'){
          Ville.name = "";
        }
        if(Age.value == 'null'){
          Age.name = "";
        }
    })
    }

    function DownloadLetter(id){ 
      var link = document.createElement("a");
        link.download = "";
        link.href = '/api/DownloadLetters?id='+id;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }
    function DownloadCV(id){
      var link = document.createElement("a");
        link.download = "";
        link.href = '/api/DownloadCVs?id='+id;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }
        
    function DownloadCVs(){
      checkedIds.forEach(obj =>{
        DownloadCV(obj["id"]);
      })
    }
    
    function DownloadLetters(){ 
      checkedIds.forEach(obj =>{
        if(obj["lettre"] !== null) DownloadLetter(obj["id"]);
        else console.log("nope");
      })
    }
</script>