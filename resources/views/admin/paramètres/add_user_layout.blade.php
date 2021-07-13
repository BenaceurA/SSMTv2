   <form class="w-full bg-opacity-90 bg-white p-10 pt-5 rounded-md" action="/addUser" method="post" enctype="multipart/form-data">
        @csrf
        @error("addusererror")
            <div id="error" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ $message }}</strong>
            </div>
        @enderror
        @if(Session::has("success"))
            <div id="status" class="mb-4 bg-green-100 border border-greenred-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ Session::get("success") }}</strong>
            </div>
        @endif
        <h1 class="block text-gray-500 font-bold mb-5 text-xl pr-4">Ajouter un nouveau utilisateur</h1>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Username">
                        Nom d'utilisateur
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Username" id="Username" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-8">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Password">
                        Mot de passe
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Password" id="Password" type="password">
                </div>
            </div>
            <div class="md:flex md:items-center mb-8">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Email">
                        Email
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Email" id="Email" type="email">
                </div>
            </div>
            <div class="md:flex md:items-center mb-8">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Confirm_Email">
                        Confirmer l'email
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Confirm_Email" id="Confirm_Email" type="email">
                </div>
            </div>
            <!-- RIGHTS !-->
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Offre Emplois
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="AO_E" id="AO_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="AO_E">
                            Ajouter un offre d'emploi
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="MO_E" id="MO_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="MO_E">
                            Modifier les offres d'emploi
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SO_E" id="SO_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SO_E">
                            Supprimer les offres d'emploi
                        </label>
                    </div>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Offre Stages
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="AO_S" id="AO_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="AO_S">
                            Ajouter un offre de stage
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="MO_S" id="MO_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="MO_S">
                            Modifier les offres de stage
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SO_S" id="SO_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SO_S">
                            Supprimer les offres de stage
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Base de donnée emploi
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TC_E" id="TC_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TC_E">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TL_E" id="TL_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TL_E">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SC_E" id="SC_E" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SC_E">
                            Supprimer les candidatures
                        </label>
                    </div>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Base de donnée stage
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TC_S" id="TC_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TC_S">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TL_S" id="TL_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TL_S">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SC_S" id="SC_S" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SC_S">
                            Supprimer les candidatures
                        </label>
                    </div>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                        Candidature Spantanée
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TC_CS" id="TC_CS" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TC_CS">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="TL_CS" id="TL_CS" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="TL_CS">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SC_E_CS" id="SC_E_CS" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SC_E_CS">
                            Supprimer les candidatures d'emploi
                        </label>
                    </div>
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SC_S_CS" id="SC_S_CS" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SC_S_CS">
                            Supprimer les candidatures de stage
                        </label>
                    </div>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="AU">
                        Ajouter les utilisateurs
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="AU" id="AU" type="checkbox">
                    </div>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="flex justify-start  md:w-1/4">
                    <label  class="required block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="DU">
                        Supprimer les utilisateurs
                    </label>
                </div>
                <div class="md:w-3/4">
                    <div>
                        <input class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="DU" id="DU" type="checkbox">
                    </div>
                </div>
            </div>
            <!-- END RIGHTS !-->
            <div class="flex justify-center">
                <button class="mt-4 w-1/6 shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Ajouter
                </button>
            </div>         
    </form>