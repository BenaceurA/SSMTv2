@extends('admin/layout')

@section("main")
<div class="flex-col w-full ">
    <div class="flex justify-center ">
        <form class="bg-white bg-opacity-90 w-2/3 p-10 rounded-md" action="/api/createJobOffer" method="post" enctype="multipart/form-data">
            @csrf
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
                    <input class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Direction" id="Direction" type="text">
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
                        <option value="DE1">DE1</option>
                        <option value="DE2">DE2</option>
                        <option value="DE3">DE3</option>
                        <option value="DE4">DE4</option>
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
                    <textarea id="editor1" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="Description" name="Description"></textarea>
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
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Enregistrer
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
                        <button onclick="Activate([{{$row->id}}],false)" class="inline-block shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold mb-3 py-2 px-2 rounded-full"></button>
                        @else
                        <button onclick="Activate([{{$row->id}}],true)" class="inline-block shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold mb-3 py-2 px-2 rounded-full"></button>
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
                        <button onclick="" class="inline-block shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded">Modifier</button>
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
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/api/activateJobs', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(
                [option,ids]
            ));
            xhr.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    if(this.responseText>0){
                        location.reload();
                    }
                }
            };
        }

        function Delete(ids){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/api/deleteJobs', true);
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
        }
    </script>
@endsection