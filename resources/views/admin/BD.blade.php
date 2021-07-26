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
  <div class = "fixed overflow-y-auto small-width bg-white rounded px-3 py-3 bg-opacity-90" style="max-height:85vh;">
    <div class="w-full">
      <button onclick="deleteItems()" class="w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingDelete" class=""></i>Supprimer
      </button>
      <button onclick="DownloadCVs()" class="mt-2 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingCVs" class=""></i>Curriculum vitae
      </button>
      @if($view == "jobs")
      <button onclick="DownloadLetters()" class="mt-2 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        <i id="loadingLetters" class=""></i>Lettre de motivation
      </button>
      @endif
    </div>
    <form method="GET" @if($view == "jobs")action="/BDemploi"@endif @if($view == "internships")action="/BDstage"@endif class="m-0 flex-col">
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
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Poste
        </label>
        <select id="Poste" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Poste">
            <option selected hidden value="null"></option>
            @foreach ($offers as $offer )
                <option value="{{$offer->Poste}}">{{$offer->Poste}}</option>
            @endforeach           
        </select>
      </div>
      @if($view == "jobs")
      <div class="mt-3 flex-col w-auto">
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
      @endif
      <div class="mt-3 flex-col w-auto">
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
      <div class="mt-3 flex-col w-auto">
        <label class="whitespace-nowrap text-gray-500 font-bold ">
          Sexe
        </label>
        <select id="Sexe" class="mt-1 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Sexe">
            <option selected hidden value="null"></option>
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
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
      <a @if($view == "jobs")href="/BDemploi"@endif @if($view == "internships")href="/BDstage"@endif>
      <button id="resetFilter" class="mt-3 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Réinitialiser
      </button>
      </a>
    </form>
  </div>
</div>

<div class="big-width ml-4 mr-4 mt-4 flex flex-col relative" style="max-height:88vh;">
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
              @if($view == "internships")
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type de stage
              </th>
              @endif
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
              @if($view == "jobs")
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Années d'expérience
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Motivation
              </th>
              @endif
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Curriculum
              </th>
              @if($view == "jobs")
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lettre
              </th>
              @endif
            </tr>
          </thead>
          <tbody class=" bg-white divide-y divide-gray-200">
          @forelse ($data as $row )
            <tr>
                <td><input id="checkbox-{{$row->id}}" 
                @if($view == "jobs")
                onchange="addId({{$row->id}},@if($row->Lettre_motivation)'{{$row->Lettre_motivation}}'@else null @endif,this)"
                @endif
                @if($view == "internships")
                onchange="addId({{$row->id}},this)" 
                @endif
                type="checkbox"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->id}}
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
                @if($view == "internships")
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Type_de_stage}}
                </td>
                @endif
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
                @if($view == "jobs")
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$row->Années_expérience}}
                </td>
                <td class="max-w-sm overflow-hidden px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  @if($row->Motivation) 
                    <button onclick="Motivation({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded">Voir</button>
                  @endif
                </td>
                @endif
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button onclick="DownloadCV({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                </td>
                @if($view == "jobs")
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @if($row->Lettre_motivation)
                    <button onclick="DownloadLetter({{$row->id}})" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Télécharger</button>
                    @else
                    <span></span>
                    @endif
                </td>
                @endif
            </tr>
            @empty
              <h3 class="w-full rounded px-4 py-4 font-medium absolute text-center text-white bg-opacity-80 top-28 ">Base de données vide</h3>
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

      let Poste = document.getElementById("Poste");
      Poste.value = url.searchParams.get("Poste");

      @if($view == "jobs")  
      let AE = document.getElementById("AE");
      AE.value = url.searchParams.get("Années_expérience");
      @endif

      let NE = document.getElementById("NE");
      NE.value = url.searchParams.get("Niveau_étude");

      let Sexe = document.getElementById("Sexe");
      Sexe.value = url.searchParams.get("Sexe");

      let Ville = document.getElementById("Ville");
      Ville.value = url.searchParams.get("Ville");
      
      let Age = document.getElementById("Age");
      Age.value = url.searchParams.get("Date_de_naissance");

      document.addEventListener("submit",()=>{
        if(Poste.value == 'null'){
          Poste.name = "";
        }
        @if($view == "jobs") 
        if(AE.value == 'null'){
          AE.name = "";
        }
        @endif
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
    });
    //CACHE DOWNLOAD PERMISIONS FOR CHECKING
    axios.get('/api/getPermissions/'+{{$userID}})
      .then(function (response) {
        
        //get permission based on the loaded view

        @if($view == "jobs")
        DownloadCVPerm = response.data.TC_E;
        DownloadLetterPerm = response.data.TL_E;
        @endif

        @if($view == "internships")
        DownloadCVPerm = response.data.TC_S;
        DownloadLetterPerm = response.data.TL_S;
        @endif
      });
    }

  @if($view == "jobs")

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
      axios.delete('/api/deleteJobApplications', {
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
      axios.get('/api/jobApplicationExists/'+id)
        .then(function(response){
          if(DownloadLetterPerm){
            var link = document.createElement("a");
            link.download = "";
            link.href = '/api/DownloadJobLetters?id='+id+'&userID='+{{$userID}};
            document.body.appendChild(link);
            link.click();
            link.remove();
          } 
          else{
            window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
          }  
        })
        .catch(function(error){
          if(error.response.status == 404){
            window.alertify.alert('Erreur',"Candidature [ id : "+id+" ] n'existe pas! Actualisez la page.");
          }
        });    
    }

    function DownloadCV(id){
      axios.get('/api/jobApplicationExists/'+id)
        .then(function(response){
          if(DownloadCVPerm){
            var link = document.createElement("a");
            link.download = "";
            link.href = '/api/DownloadJobCVs?id='+id+'&userID='+{{$userID}};
            document.body.appendChild(link);
            link.click();
            link.remove();
          }
          else{
            window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
          }
        })
        .catch(function(error){
          if(error.response.status == 404){
            window.alertify.alert('Erreur',"Candidature [ id : "+id+" ] n'existe pas! Actualisez la page.");
          }
        });
          
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
      
      axios.get('/api/jobApplicationMotivation/'+id)
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
  @endif

  @if($view == "internships")

    function addId(id,checkbox){
        if(checkbox.checked == true){
            checkedIds.push(id);            
        }
        else{
          checkedIds.splice(checkedIds.indexOf(id),1);
        }
        console.log(checkedIds);
    }

    function addAll(checkbox){
        @foreach ($data as $row )
          addId({{$row->id}},checkbox);
          if(checkbox.checked == true) document.getElementById("checkbox-"+{{$row->id}}).checked = true;
          else if(checkbox.checked == false) document.getElementById("checkbox-"+{{$row->id}}).checked = false;
        @endforeach       
        console.log(checkedIds);
    }

    function deleteItems(){
      let loadingDelete = document.getElementById("loadingDelete");

      loadingDelete.className = "fa fa-circle-o-notch fa-spin mr-2";
      axios.delete('/api/deleteInternshipApplications', {
                data : {
                    userID:{{$userID}},
                    ids:checkedIds
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

    function DownloadCV(id){
      axios.get('/api/internshipApplicationExists/'+id)
        .then(function(response){
          if(DownloadCVPerm){
            var link = document.createElement("a");
            link.download = "";
            link.href = '/api/DownloadInternshipCVs?id='+id+'&userID='+{{$userID}};
            document.body.appendChild(link);
            link.click();
            link.remove();
          }
          else{
            window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
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
        checkedIds.forEach(id =>{
        DownloadCV(id);
        })
      }
      else{
        window.alertify.alert("Erreur","Vous n'avez pas l'autorisation!");
      }   
    }
  @endif

</script>
@endsection