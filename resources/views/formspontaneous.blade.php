@if ($type2 == "internship")
    <form class="w-full max-w-full md:max-w-5xl lg:max-w-5xl my-5 md:my-10 lg:my-10 mx-5 bg-opacity-90 bg-white p-5 md:p-10 lg:p-10 rounded-md" action="/api/postSpontaneous" method="post" enctype="multipart/form-data">
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
            <input hidden value="stage" name="Candidature" id="Candidature">
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Type_de_stage">
                        Type de stage
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select required class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Type_de_stage" id="Type_de_stage">
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Conventionné">Conventionné</option>
                        <option value="Libre">Libre</option>
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Département">
                        Département
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Département" id="Département">
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Département d'Audit contrôle gestion et audit interne">Département d'Audit contrôle gestion et audit interne</option>
                        <option value="Département d’informatique">Département d’informatique</option>
                        <option value="Département d'Hygiène Sécurité Environnement">Département d'Hygiène Sécurité Environnement</option>
                        <option value="Département gestion matériel">Département gestion matériel</option>
                        <option value="Département de la comptabilité">Département de la comptabilité</option>
                        <option value="Département de finance">Département de finance</option>
                        <option value="Département administratif et juridique">Département administratif et juridique</option>
                        <option value="Département administratif des ventes">Département administratif des ventes</option>
                        <option value="Département de ressources humaines">Département de ressources humaines</option>
                        <option value="Département d'achats">Département d'achats</option>
                        <option value="Département d'atelier">Département d'atelier</option>
                        <option value="Département bureau méthode maintenance">Département bureau méthode maintenance</option>
                        <option value="Département logistique">Département logistique</option>
                        <option value="Département d'exploitation">Département d'exploitation</option>
                        <option value="Département d'étude des prix">Département d'étude des prix</option>
                        <option value="Département topographe">Département topographe</option>
                        <option value="Département administration marchés publiques">Département administration marchés publiques</option>
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="">
                        Période de stage
                    </label>
                </div>
                <div class="flex md:w-1/4 md:mr-8">
                    <label class="block text-gray-500 font-bold md:text-right mt-auto mb-auto pr-4" for="Period_start">
                        Du
                    </label>
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Period_start" id="Period_start" type="date">
                </div>
                <div class="flex md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mt-auto mb-auto pr-4" for="Period_end">
                        Au
                    </label>
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Period_end" id="Period_end" type="date">
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
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Téléphone">
                        Téléphone
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Téléphone" id="Téléphone" type="text">
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
                    <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="Féminin" name="Sexe" id="Female" type="radio">
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Female">
                        Féminin
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
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Niveau_d'étude">
                        Niveau d'étude
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_d'étude" id="Niveau_d'étude" required>
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
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Etablissement_de_formation">
                        Etablissement de formation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Etablissement_de_formation" id="Etablissement_de_formation" type="text">
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
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="lettre">
                        Joindre lettre de motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="lettre" id="lettre" type="file">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Motivation">
                        Motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <textarea class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Motivation" id="Motivation"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Envoyer
                    </button>
                </div>
            </div>
    </form>

@elseif($type2 == "job")
    <form class="w-full max-w-full md:max-w-5xl lg:max-w-5xl my-5 md:my-10 lg:my-10 mx-5 bg-opacity-90 bg-white p-5 md:p-10 lg:p-10 rounded-md" action="/api/postSpontaneous" method="post" enctype="multipart/form-data">
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
            <input hidden value="emploi" name="Candidature" id="Candidature">
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Type_de_stage">
                        Département
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select required class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Département" id="Département">
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Département d'Audit contrôle gestion et audit interne">Département d'Audit contrôle gestion et audit interne</option>
                        <option value="Département d’informatique">Département d’informatique</option>
                        <option value="Département d'Hygiène Sécurité Environnement">Département d'Hygiène Sécurité Environnement</option>
                        <option value="Département d'administration et finance">Département d'administration et finance</option>
                        <option value="Département gestion matériel">Département gestion matériel</option>
                        <option value="Département de la comptabilité">Département de la comptabilité</option>
                        <option value="Département de finance">Département de finance</option>
                        <option value="Département administratif et juridique">Département administratif et juridique</option>
                        <option value="Département administratif des ventes">Département administratif des ventes</option>
                        <option value="Département de ressources humaines">Département de ressources humaines</option>
                        <option value="Département d'achats">Département d'achats</option>
                        <option value="Département d'atelier">Département d'atelier</option>
                        <option value="Département bureau méthode maintenance">Département bureau méthode maintenance</option>
                        <option value="Département logistique">Département logistique</option>
                        <option value="Département pole travaux">Département pole travaux</option>
                        <option value="Département d'exploitation">Département d'exploitation</option>
                        <option value="Département d'étude des prix">Département d'étude des prix</option>
                        <option value="Département topographe">Département topographe</option>
                        <option value="Département administration marchés publiques">Département administration marchés publiques</option>
                    </select>
                    
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Poste">
                        Poste
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Poste" id="Poste" type="text">
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
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Téléphone">
                        Téléphone
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Téléphone" id="Téléphone" type="text">
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
                    <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="Féminin" name="Sexe" id="Female" type="radio">
                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Female">
                        Féminin
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
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Niveau_d'étude">
                        Niveau d'étude
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Niveau_d'étude" id="Niveau_d'étude" required>
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
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Etablissement_de_formation">
                        Etablissement de formation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Etablissement_de_formation" id="Etablissement_de_formation" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Années_d'expérience">
                        Années d'expérience
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Années_d'expérience" id="Années_d'expérience" required>
                        <option value="" disabled selected hidden>-Choisir-</option>
                        <option value="Dédutant">Dédutant</option>
                        <option value="Moins de 1 an">Moins de 1 an</option>
                        <option value="De 1 à 3 ans">De 1 à 3 ans</option>
                        <option value="De 3 à 5 ans">De 3 à 5 ans</option>
                        <option value="De 5 à 10 ans">De 5 à 10 ans</option>
                        <option value="Plus de 10 ans">Plus de 10 ans</option>
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
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="lettre">
                        Joindre lettre de motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="lettre" id="lettre" type="file">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Motivation">
                        Motivation
                    </label>
                </div>
                <div class="md:w-3/4">
                    <textarea class=" border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Motivation" id="Motivation"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Envoyer
                    </button>
                </div>
            </div>
    </form>
@endif
