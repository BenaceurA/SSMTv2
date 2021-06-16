@extends('admin/layout')

@section("main")
    <div class="w-full flex justify-center ">
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

    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection