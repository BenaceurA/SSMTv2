<form class="w-full max-w-full md:max-w-5xl lg:max-w-5xl my-5 md:my-10 lg:my-10 mx-5 bg-opacity-90 bg-white p-5 md:p-10 lg:p-10 rounded-md" action="/api/poststage" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="mb-8 bg-red-200 p-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-800">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Poste">
                        Poste
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input value="{{$offer->Offre}}" readonly="readonly" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Poste" id="Poste" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Direction">
                        Direction
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input value="{{$offer->Direction}}" readonly="readonly" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Direction" id="Direction" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="D??partement">
                        D??partement
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input value="{{$offer->D??partement}}" readonly="readonly" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="D??partement" id="D??partement" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Nom_Prenom">
                        Nom & Prenom
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Nom_Prenom" id="Nom_Prenom" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Adresse_mail">
                        Adresse mail
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Adresse_mail" id="Adresse_mail" type="email">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="T??l??phone">
                        T??l??phone
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="T??l??phone" id="T??l??phone" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Adresse">
                        Adresse
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Adresse" id="Adresse" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Ville">
                        Ville
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select required class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ville" id="Ville">
                        <option value="" disabled selected hidden>-Choisir-</option>
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
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Sexe
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="Masculin" name="Sexe" id="Male" type="radio">
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Male">
                        Masculin
                    </label>
                    <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="F??minin" name="Sexe" id="Female" type="radio">
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Female">
                        F??minin
                    </label>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Date_de_naissance">
                        Date de naissance
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Date_de_naissance" id="Date_de_naissance" type="date">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Niveau_d'??tude">
                        Niveau d'??tude
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_d'??tude" id="Niveau_d'??tude" required>
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Qualification avant Bac">Qualification avant Bac</option>
                        <option value="Bac">Bac</option>
                        <option value="Bac+2">Bac+2</option>
                        <option value="Bac+3/4">Bac+3/4</option>
                        <option value="Bac+5 et plus">Bac+5 et plus</option>
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Etablissement_de_formation">
                        Etablissement de formation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Etablissement_de_formation" id="Etablissement_de_formation" type="text">
                </div>
            </div>
            {{-- <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Ann??es_d'exp??rience">
                        Ann??es d'exp??rience
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ann??es_d'exp??rience" id="Ann??es_d'exp??rience" required>
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="D??dutant">D??dutant</option>
                        <option value="Moins de 1 an">Moins de 1 an</option>
                        <option value="De 1 ?? 3 ans">De 1 ?? 3 ans</option>
                        <option value="De 3 ?? 5 ans">De 3 ?? 5 ans</option>
                        <option value="De 5 ?? 10 ans">De 5 ?? 10 ans</option>
                        <option value="Plus de 10 ans">Plus de 10 ans</option>
                    </select>
                </div>
            </div> --}}
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Ann??es_d'exp??rience">
                        Type de stage
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Type_de_stage" id="Type_de_stage" required>
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Conventionn??">Conventionn??</option>
                        <option value="Libre">Libre</option>
                    </select>
                </div>
            </div> 
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="CV">
                        Joindre CV:
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="appearance-none rounded w-full py-2  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="CV" id="CV" type="file">
                </div>
            </div>
            {{-- <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="lettre">
                        Joindre lettre de motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="lettre" id="lettre" type="file">
                </div>
            </div> --}}
            {{-- <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Motivation">
                        Motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <textarea class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Motivation" id="Motivation"></textarea>
                </div>
            </div> --}}
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Envoyer
                    </button>
                </div>
            </div>
</form>