   <form class="w-full max-w-5xl m-10 bg-opacity-90 bg-white p-10 pt-5 rounded-md" action="/api/postemploi" method="post" enctype="multipart/form-data">
        <h1 class="block text-gray-500 font-bold mb-5 text-xl pr-4">Ajouter un nouveau utilisateur</h1>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Username">
                        Nom d'utilisateur
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Username" id="Username" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Username">
                        Adresse e-mail
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Username" id="Username" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-8">
                <div class="flex justify-start md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Username">
                        Mot de passe
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Username" id="Username" type="text">
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
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Ajouter" id="Ajouter" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Ajouter">
                            Ajouter un offre d'emploi
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Modifier" id="Modifier" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Modifier">
                            Modifier les offres d'emploi
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Supprimer" id="Supprimer" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Supprimer">
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
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="AjouterStage" id="AjouterStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="AjouterStage">
                            Ajouter un offre de stage
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="ModifierStage" id="ModifierStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="ModifierStage">
                            Modifier les offres de stage
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
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
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="ModifierStage" id="ModifierStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="ModifierStage">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
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
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="ModifierStage" id="ModifierStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="ModifierStage">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
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
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="ModifierStage" id="ModifierStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="ModifierStage">
                            Télécharger les CVs
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
                            Télécharger les lettres
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="ModifierStage" id="ModifierStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="ModifierStage">
                            Supprimer les candidatures d'emploi
                        </label>
                    </div>
                    <div>
                        <input required class="border-2 mr-1 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="SupprimerStage" id="SupprimerStage" type="checkbox">
                        <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="SupprimerStage">
                            Supprimer les candidatures de stage
                        </label>
                    </div>
                </div>
            </div>
            <!-- END RIGHTS !-->
    </form>