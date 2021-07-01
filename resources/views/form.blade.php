<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .background-img {
            background: url('../img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100%;
        }
        .required::after{
            content : "*";
            color: red;
        }
    </style>
</head>

<body class="relative h-screen background-img">
    <div class="flex justify-center ">
        <form class="w-full max-w-5xl m-10 bg-opacity-90 bg-white p-10 rounded-md" @if($type == "emploi") action="/api/postemploi" @endif @if($type == "stage") action="/api/poststage" @endif method="post" enctype="multipart/form-data">
            @csrf
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
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Département">
                        Département
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input value="{{$offer->Département}}" readonly="readonly" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="Département" id="Département" type="text">
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
    </div>
    <script>
    </script>
</body>

</html>