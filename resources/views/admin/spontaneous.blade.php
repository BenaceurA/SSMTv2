@extends('admin/layout',['username' => $username])

@section('main')

<div id="motivationModal" onclick="event.stopPropagation()" class="shadow-2xl hidden z-10 overflow-y-auto absolute bg-gray-100 rounded  p-10" style="max-height:70vh;width:50vw;">
  <div id="motivation">
  
  </div>
  <button onclick="closeMotivation()" class="w-3/12 mt-4 bottom-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Fermer
  </button>
</div>


<div class="small-width text-sm mt-4 ml-4 " style="font-size:13px;">
  <div class = "fixed overflow-y-auto small-width bg-white px-3 py-3 bg-opacity-90 rounded" style="max-height:85vh;">
    <div class="w-full">
      <button onclick="deleteItems()" class=" w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingDelete" class=""></i>Supprimer
      </button>
      <button onclick="DownloadCVs()" class="mt-2 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingCVs" class=""></i>Curriculum vitae
      </button>
      <button onclick="DownloadLetters()" class="mt-2 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingLetters" class=""></i>Lettre de motivation
      </button>
    </div>
    <form method="GET" action="/BDspontaneous" class="m-0 flex-col">
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Option
        </label>
        <select id="Option" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Option">
            <option selected value="AND">AND</option>
            <option value="OR">OR</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold">
          Candidature
        </label>
        <select id="Candidature" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Candidature">
          <option selected hidden value="null"></option>
          <option value="emploi">Emploi</option>
          <option value="stage">Stage</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold">
          Ann??e d???exp??rience
        </label>
        <select id="AE" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ann??es_exp??rience">
          <option selected hidden value="null"></option>
          <option value="D??dutant">D??dutant</option>
          <option value="Moins de 1 an">Moins de 1 an</option>
          <option value="De 1 ?? 3 ans">De 1 ?? 3 ans</option>
          <option value="De 3 ?? 5 ans">De 3 ?? 5 ans</option>
          <option value="De 5 ?? 10 ans">De 5 ?? 10 ans</option>
          <option value="Plus de 10 ans">Plus de 10 ans</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Niveau d?????tude
        </label>
        <select id="NE" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_??tude">
            <option selected hidden value="null"></option>
            <option value="Qualification avant Bac">Qualification avant Bac</option>
            <option value="Bac">Bac</option>
            <option value="Bac+2">Bac+2</option>
            <option value="Bac+3/4">Bac+3/4</option>
            <option value="Bac+5 et plus">Bac+5 et plus</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Sexe
        </label>
        <select id="Sexe" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Sexe">
            <option selected hidden value="null"></option>
            <option value="Masculin">Masculin</option>
            <option value="F??minin">F??minin</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Ville
        </label>
        <select id="Ville" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ville">
            <option selected hidden value="null"></option>
            <option value="Agadir">Agadir</option>
            <option value="Asilah">Asilah</option>
            <option value="B??ni Mellal">B??ni Mellal</option>
            <option value="Casablanca">Casablanca</option>
            <option value="Chefchaouen">Chefchaouen</option>
            <option value="El Jadida">El Jadida</option>
            <option value="El hoceima">El hoceima</option>
            <option value="El Kel??a des Sraghna">El Kel??a des Sraghna</option>
            <option value="F??s">F??s</option>
            <option value="Kh??nifra">Kh??nifra</option>
            <option value="Kh??misset">Kh??misset</option>
            <option value="K??nitra">K??nitra</option>
            <option value="Khouribga">Khouribga</option>
            <option value="La??youne">La??youne</option>
            <option value="Marrakech">Marrakech</option>
            <option value="Mekn??s">Mekn??s</option>
            <option value="Mohamm??dia">Mohamm??dia</option>
            <option value="Nador">Nador</option>
            <option value="Oujda">Oujda</option>
            <option value="Rabat">Rabat</option>
            <option value="Safi">Safi</option>
            <option value="Sal??">Sal??</option>
            <option value="Taroudant">Taroudant</option>
            <option value="Tiznit">Tiznit</option>
            <option value="Taza">Taza</option>
            <option value="T??mara">T??mara</option>
            <option value="Tanger">Tanger</option>
            <option value="T??touan">T??touan</option>
        </select>
      </div>
      <div class="mt-3 flex-col w-auto">
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
      <button id="submitFilter" class="mt-3 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Filter
      </button>
      <a href="/BDspontaneous">
      <button id="resetFilter" class="mt-3 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        R??initialiser
      </button>
      </a>
    </form>
  </div>
</div>

<div class="big-width ml-4 mr-4 mt-4 flex flex-col relative">
  <div class="overflow-x-scroll max-w-full  border-b-4 rounded mb-4">
    <div class=" align-middle inline-block">
      <div class="shadow overflow-hidden border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-200">
            <tr>
              <th><input class="checkboxes" onchange="addAll(this)" type="checkbox"></th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Id
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Candidature
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Cr??er
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                D??partement
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Poste
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type de stage
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Debut de stage
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fin de stage
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom & Pr??nom
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Adresse mail
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                T??l??phone
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
                Niveau d'??tudes
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Etablissement de formation
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ann??es d'exp??rience
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Motivation
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Curriculum
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lettre
              </th>
            </tr>
          </thead>
          <tbody class=" bg-white divide-y divide-gray-200">
          @forelse ($data as $row )
            <tr>
                <td><input id="checkbox-{{$row->id}}" onchange="addId({{$row->id}},@if($row->Lettre_motivation)'{{$row->Lettre_motivation}}'@else null @endif,this)" type="checkbox">
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->id}}
                </td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Candidature}}
                </td>       
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->created_at}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->D??partement}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Poste}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Type_de_stage}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Period_start}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Period_end}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Nom_Prenom}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Adresse_mail}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->T??l??phone}}
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
                    {{$row->Niveau_??tude}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Etablissement_de_formation}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Ann??es_exp??rience}}
                </td>
                <td class="max-w-sm overflow-hidden px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  @if($row->Motivation) 
                    <button onclick="Motivation({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded">Voir</button>
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button onclick="DownloadCV({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">T??l??charger</button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @if($row->Lettre_motivation)
                    <button onclick="DownloadLetter({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">T??l??charger</button>
                    @else
                    <span></span>
                    @endif
                </td>
            </tr>
            @empty
              <h3 class="w-full rounded px-4 py-4 font-medium absolute text-center bg-gray-500 bg-opacity-90 text-white top-28 ">Base de donn??es vide</h3>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $data->links() }}
</div>
<script>

    let checkedIds = [];
    let DownloadCVPerm = 0;
    let DownloadLetterPerm = 0;

    window.onload = ()=>{
      let url = new URL(window.location.href);

      let AE = document.getElementById("AE");
      AE.value = url.searchParams.get("Ann??es_exp??rience");

      let NE = document.getElementById("NE");
      NE.value = url.searchParams.get("Niveau_??tude");

      let Sexe = document.getElementById("Sexe");
      Sexe.value = url.searchParams.get("Sexe");

      let Ville = document.getElementById("Ville");
      Ville.value = url.searchParams.get("Ville");

      let Age = document.getElementById("Age");
      Age.value = url.searchParams.get("Date_de_naissance");

      let Candidature = document.getElementById("Candidature");
      Candidature.value = url.searchParams.get("Candidature");

      document.addEventListener("submit",()=>{
      
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
        if(Candidature.value == 'null'){
          Candidature.name = "";
        }
    });
    //CACHE PERMISIONS FOR CHECKING
    axios.get('/api/getPermissions/'+{{$userID}})
      .then(function (response) {
        DownloadCVPerm = response.data.TC_CS;
        DownloadLetterPerm = response.data.TL_CS;
      });
    }

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
      let loadingDelete = document.getElementById("loadingDelete");
      //retrieve only the ids from checkedIds (disgard letter)
      let ids = [];
        checkedIds.forEach(obj=>{
          ids.push(obj.id);
        })
      loadingDelete.className = "fa fa-circle-o-notch fa-spin mr-2";
      axios.delete('/api/deleteSpontaneousApplications', {
                data : {
                    userID:{{$userID}},
                    ids:ids
                    }
            })
            .then(function (response) {
                if(response.status == 200){
                    location.reload();
                }
                else{
                  loadingDelete.className = "";
                }
            })
            .catch(function (error) {
                loadingDelete.className = "";
                if(error.response.status == 403){
                    window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
                }
            });   
    }

    function DownloadLetter(id){
      axios.get('/api/spontaneousApplicationExists/'+id)
        .then(function(response){
          if(response.status == 200){
            if(DownloadCVPerm){
              var link = document.createElement("a");
              link.download = "";
              link.href = '/api/DownloadSpontaneousLetters?id='+id+'&userID='+{{$userID}};
              document.body.appendChild(link);
              link.click();
              link.remove();
            } 
            else{
              window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
            }  
          }
        })
        .catch(function(error){
          if(error.response.status == 404){
            window.alertify.alert('Erreur',"Candidature [ id : "+id+" ] n'existe pas! Actualisez la page.");
          }
        })
      
    }

    function DownloadCV(id){
      axios.get('/api/spontaneousApplicationExists/'+id)
        .then(function(response){
          if(response.status == 200){
            if(DownloadLetterPerm){
              var link = document.createElement("a");
              link.download = "";
              link.href = '/api/DownloadSpontaneousCVs?id='+id+'&userID='+{{$userID}};
              document.body.appendChild(link);
              link.click();
              link.remove();
            }
            else{
              window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
            }
          }
        })
        .catch(function(error){
          if(error.response.status == 404){
            window.alertify.alert('Erreur',"Candidature [ id : "+id+" ] n'existe pas! Actualisez la page.");
          }
        })
          
    }

    function DownloadCVs(){
      if(DownloadCVPerm){
        checkedIds.forEach(obj =>{
        DownloadCV(obj["id"]);
        })
      }
      else{
        window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
      }   
    }

    function DownloadLetters(){ 
      if(DownloadLetterPerm){
        checkedIds.forEach(obj =>{
          if(obj["lettre"] !== null) DownloadLetter(obj["id"]);
        })
      }
      else{
        window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
      }
    }

    function Motivation(id){
      axios.get('/api/spontaneousApplicationMotivation/'+id)
        .then(function (response) {
          let modal = document.getElementById("motivationModal"); 
          document.getElementById("motivation").innerHTML = "<pre>"+ response.data; +"</pre>";
          modal.classList.remove("hidden");
      })
        .catch(function (error) {
            console.log(error);
      })
    }

    function closeMotivation(){
      let modal = document.getElementById("motivationModal"); 
      modal.classList.add("hidden");
      document.getElementById("motivation").innerHTML = "";
    }

    document.onclick = function(e){
      let modal = document.getElementById("motivationModal");
      if(e.target.id !== 'motivationModal'){
        closeMotivation();
      } 
    };
</script>
@endsection