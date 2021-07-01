@extends('admin/layout',['username' => $username])

@section("main")
<div class="flex-col w-full ">
    <div class="flex justify-center ">
        <form id="form" class="bg-white bg-opacity-90 w-11/12 p-10 rounded-md" method="post" enctype="multipart/form-data">
            <input id="id" name="id" type="hidden">
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Poste">
                        Offre
                    </label>
                </div>
                <div class="md:w-5/6">
                    <input class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Offre" id="Offre" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Direction">
                        Direction
                    </label>
                </div>
                <div class="md:w-5/6">
                    <select onchange="loadDepartements()" class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Direction" id="Direction">
                        <option selected hidden disabled value="null"></option>
                        <option value="Direction générale">Direction générale</option>
                        <option value="Administration">Administration</option>
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Département">
                        Département
                    </label>
                    
                </div>
                <div class="md:w-5/6">
                    <select class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Département" id="Département">
                        <option selected hidden disabled value="null"></option>
                        {{-- <option value="Département d'Audit contrôle gestion et audit interne">Département d'Audit contrôle gestion et audit interne</option>
                        <option value="Département d’informatique">Département d’informatique</option>
                        <option value="Département d'Hygiène Sécurité Environnement">Département d'Hygiène Sécurité Environnement </option>
                        <option value="Département d'administration et finance">Département d'administration et finance</option>
                        <option value="Département gestion matériel">Département gestion matériel</option>
                        <option value="Département de la comptabilité">Département de la comptabilité</option>
                        <option value="Département de finance">Département de finance</option>
                        <option value="Département administratif et juridique">Département administratif et juridique</option>
                        <option value="Département administratif des ventes">Département administratif des ventes</option>
                        <option value="Département de ressources humaines">Département de ressources humaines</option>
                        <option value="Département d'achats">Département d'achats</option>
                        <option value="Département Gestion Matériels">Département Gestion Matériels</option>
                        <option value="Département d'atelier">Département d'atelier</option>
                        <option value="Département bureau méthode maintenance">Département bureau méthode maintenance</option>
                        <option value="Département logistique">Département logistique</option>
                        <option value="Département d'exploitation ">Département d'exploiatation</option>
                        <option value="Département d'étude des prix">Département d'étude des prix</option>
                        <option value="Département topographe">Département topographe</option>
                        <option value="Département administration marchés publiques">Département administration marchés publiques</option> --}}
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Département">
                        Description
                    </label>
                </div>
                <div class="md:w-5/6">
                    <textarea id="editor1" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Description"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Activation
                    </label>
                </div>
                <div class="md:w-5/6">            
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="On">
                    <input checked class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Activation" value="1" id="On" type="radio">
                        On
                    </label>
                    
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Off">
                    <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Activation" value="0" id="Off" type="radio">
                        Off
                    </label>
                </div>
            </div>
            <div class="">
                <div id="btnDiv" class=":w-full flex justify-center">
                    <button id="formBtn" onclick="Send()" class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                        Ajouter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class ="box-border flex mt-8 mb-8 w-full">
        <div class = "w-2/12 m-4 ">
            <div class="w-full p-4 bg-white bg-opacity-90 border-t-4 border-b-4 rounded">
                <button onclick="Delete(checkedIds)" class="w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                  Supprimer
                </button>
                <button onclick="Activate(checkedIds,true)" class="mt-4 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                  Activer
                </button>
                <button onclick="Activate(checkedIds,false)" class="mt-4 w-full shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                  Desactiver
                </button>
            </div>
        </div>
        
        {{-- table --}}

        <div class="border-t-4  rounded w-10/12 mr-4 mt-4 flex flex-col">
        <div class="overflow-x-auto max-w-full">

        <table class="border-b-4 table-auto divide-y divide-gray-200">    
            <thead class="bg-gray-200">
                <tr>
                  <th>
                       
                  </th>
                  <th>
                    <input class="checkboxes" onchange="addAll(this)" type="checkbox">
                  </th>                   
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Id
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Créer le
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Modifier le
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Offre
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Direction
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Département
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      
                  </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($data as $row )
                <tr class ="min-h-80">
                    <td>
                        @if($row->Activation == 1)
                        <button id="availableBtn-{{$row->id}}" onclick="Activate([{{$row->id}}],false)" class="inline-block shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold mb-3 py-2 px-2 rounded-full"></button>
                        @else
                        <button id="availableBtn-{{$row->id}}" onclick="Activate([{{$row->id}}],true)" class="inline-block shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold mb-3 py-2 px-2 rounded-full"></button>
                        @endif 
                    </td>
                    <td>
                        <input class="p-4" id="checkbox-{{$row->id}}" onchange="addId({{$row->id}},this)" type="checkbox">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->id}}
                    </td>              
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->created_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->updated_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->Offre}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->Direction}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$row->Département}}
                    </td>
                    <td class=" overflow-y-auto px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class=" max-h-20">
                            {!!$row->Description!!}
                        </div>
                    </td>
                    <td>
                        <button onclick='Modify("{!!$row->Description!!}","{{$row->Offre}}","{{$row->Direction}}","{{$row->Département}}","{{$row->id}}")' class="inline-block shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Modifier</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
        </div>

        <!--endtable!-->

    </div>
    
</div>

    <script>
        CKEDITOR.replace('editor1');
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

        function Activate(ids,option){ 
            axios.post('/api/activateJobs', [option,ids])
            .then(function (response) {
                if(response.data>0){
                    console.log(response.data);
                    ids.forEach(el => {
                            let btn =  document.getElementById("availableBtn-"+el);
                            btn.onclick = ()=>{
                                Activate([el],!option);
                            }
                            let color;
                            if(option == true) color = "green";
                            else color = "yellow";
                            btn.className = "inline-block shadow bg-"+color+"-500 hover:bg-"+color+"-400 focus:shadow-outline focus:outline-none text-white font-bold mb-3 py-2 px-2 rounded-full"
                        })
                }
            })
            .catch(function (error) {
                if(error.response.status == 405){
                    // he's not allowed to create new posts
                    window.alert("Vous n'avez pas l'autorisation!");
                }
            });
        }

        function Delete(ids){
            axios.delete('/api/deleteJobs', {
                data : ids
            })
            .then(function (response) {
                if(response.data>0){
                    location.reload();
                }
            })
            .catch(function (error) {
                if(error.response.status == 405){
                    // he's not allowed to create new posts
                    window.alert("Vous n'avez pas l'autorisation!");
                }
            });  
        }

        function Modify(desc,ofr,drc,dep,id){ //modify the job offer
            CKEDITOR.instances.editor1.setData(desc);
            document.getElementById("Offre").value = ofr;
            document.getElementById("Direction").value=drc;
            document.getElementById("Département").value=dep;
            document.getElementById("id").value = id;
            document.getElementById("form").action = "api/updateJobOffer"
            let formBtn = document.getElementById("formBtn");
            formBtn.innerHTML = "Modifer";
            formBtn.onclick = ()=>{Update()};
            if(document.getElementById("cancelBtn") == null){
                let cancelBtn = document.createElement("Button");
                cancelBtn.id = "cancelBtn";
                cancelBtn.type = "button";
                cancelBtn.innerHTML = "Cancel";
                cancelBtn.style.marginLeft = "20px";
                cancelBtn.onclick = ()=>{
                    cancelModify();
                }
                cancelBtn.className= "shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded";
                document.getElementById("btnDiv").appendChild(cancelBtn);
            }
            
            window.scrollTo(0, 0);
        }

        function cancelModify(){
            CKEDITOR.instances.editor1.setData("");
            document.getElementById("Offre").value = "";
            document.getElementById("Direction").value= "";
            document.getElementById("Département").value= "";
            document.getElementById("id").value = null;
            let formBtn = document.getElementById("formBtn");
            formBtn.innerHTML = "Ajouter";
            formBtn.onclick = ()=>{Send()};
            document.getElementById("btnDiv").removeChild(document.getElementById("cancelBtn"));
            return false;
        }
        
        function Send(){
            axios.post('/api/createJobOffer', {
                Offre: document.getElementById("Offre").value,
                Direction: document.getElementById("Direction").value,
                Département:document.getElementById("Département").value,
                Description:CKEDITOR.instances.editor1.getData(),
                Activation:document.querySelector('input[name="Activation"]:checked').value    
            })
            .then(function (response) {
                if(response.status == 200){
                    location.reload();
                }
            })
            .catch(function (error) {
                if(error.response.status == 405){
                    // he's not allowed to create new posts
                    window.alert("Vous n'avez pas l'autorisation!");
                }
                else if(error.response.status == 422){
                    // he's not allowed to create new posts
                    window.alert("Tous les champs sont obligatoires!");
                }
            });  
        }

        function Update(){
            axios.put('/api/updateJobOffer', {
                id : document.getElementById("id").value,
                Offre: document.getElementById("Offre").value,
                Direction: document.getElementById("Direction").value,
                Département:document.getElementById("Département").value,
                Description:CKEDITOR.instances.editor1.getData(),
                Activation:document.querySelector('input[name="Activation"]:checked').value    
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                if(error.response.status == 405){
                    //he's not allowed to update posts
                    window.alert("Vous n'avez pas l'autorisation!");
                }
            });  
        }
        
        function loadDepartements(){
            let departement = document.getElementById("Département");
            let direction = document.getElementById("Direction");

            function load(elements){
                elements.forEach(element=>{
                    let option  =  document.createElement("option");
                    option.value = element;
                    option.innerHTML = element;
                    departement.appendChild(option);
                })   
            }

            let childOption = departement.lastChild;

            while (childOption.value != "null") {
            departement.removeChild(childOption);
            childOption = departement.lastChild;
            }

            switch(direction.value) {
                case "Direction générale":
                    load([
                        "Département d'Audit contrôle gestion et audit interne",
                        "Département d’informatique",
                        "Département d'Hygiène Sécurité Environnement",
                        "Département d'administration et finance",
                        "Département gestion matériel"
                    ]);
                    break;
                case "Administration":
                    load([
                        "Département d'Audit contrôle gestion et audit interne",
                        "Département d’informatique",
                        "Département d'Hygiène Sécurité Environnement",
                        "Département de la comptabilité",
                        "Département de finance",
                        "Département administratif et juridique",
                        "Département administratif des ventes",
                        "Département de ressources humaines",
                        "Département d'achats",
                        "Département gestion matériel",
                        "Département d'atelier",
                        "Département bureau méthode maintenance",
                        "Département logistique",
                        "Département d'exploiatation",
                        "Département d'étude des prix",
                        "Département topographe",
                        "Département administration marchés publiques"
                    ]);
                    break;
                }
        }
    function l(t){
        console.log(t);
    }
    </script>
@endsection