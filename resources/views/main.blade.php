<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .background-img {
            background: url('img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 96%;
        }
        .select {
            appearance :none;
            background-color: rgba(255, 255, 255, 75%);
            border: none;
            padding: 0.5rem 1rem;
            margin: 0;
            width: 100%;
            font-family: inherit;
            font-weight:normal;
            font-size: inherit;
            line-height: inherit;
            cursor: pointer;
        }

        .select:focus {
            
            outline: none;

        }
        .select::placeholder{
            color:black;
            opacity :0.9;
        }
    </style>
</head>

<body class="relative h-full">
    <div class="h-screen flex-col">
        <div class="absolute text-white">
        </div>
        <div class="absolute h-screen w-screen flex-wrap flex justify-center content-center">
            <div class=" h-auto flex justify-center" style="width: 60%;">
                <form class="flex justify-center" style="width: 100%;" action="/search" method="POST">
                    @csrf
                    <div class="relative inline mr-2 " style="width: 40%;">
                        {{-- <select onchange="checkChoise()" class=" shadow-lg rounded py-2 px-5 " name="select1" id="select1">
                            <option selected hidden disabled value="null">Qu'est-ce que tu cherches ?</option>
                            <option value="Offre d'emploi">Offre d'emploi</option>
                            <option value="Offre de stage">Offre de stage</option>
                            <option value="Candidature spontanée">Candidature spontanée</option>
                        </select> --}}
                        <input onclick="showSelect1()"  readonly placeholder="Qu'est-ce que tu cherches ?" class="select shadow-lg rounded py-2 px-5" type="text" name="select1" id="select1">
                        <div id="select1Elements" style="display:none;" class="bg-opacity-85 w-full bg-white absolute top-12 right-0 rounded">
                            <ul>
                                <li onclick="select1('Offre d\'emploi')" class="border-b cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Offre d'emploi</li>
                                <li onclick="select1('Offre de stage')" class="border-b cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Offre de stage</li>
                                <li onclick="select1('Candidature spontanée')" class="border-b cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Candidature spontanée</li>
                            <ul>
                        </div>
                    </div>

                    <div class="relative inline mr-2 " style="width: 40%;">
                        {{-- <select size="1" class="shadow-lg rounded py-2 px-5 " name="select2" id="select2">
                            <option selected hidden disabled value="null">Quel département ?</option>
                        </select> --}}
                        <input onclick="showSelect2()" readonly placeholder="Quel département ?" class="select shadow-lg rounded py-2 px-5" type="text" name="select2" id="select2">
                        <div  id="select2Elements" class="overflow-y-auto max-h-60 bg-opacity-100 w-full bg-white absolute top-12 right-0 rounded">
                            <ul>
                                
                            <ul>
                        </div>
                    </div>
                    
                    <button onclick="" class="shadow-lg bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none font-bold text-white rounded py-2 px-auto " type="submit" value="Lancer" style="width: 20%;">
                        Lancer
                    </button>
                </form>
            </div>
        </div>
        <div class="background-img text-white ">
        </div>
        <div class="text-white bg-black w-full" style="height: 4%;">
            <div class="h-full flex justify-center mt-auto">
                <div class="mt-auto mb-auto">
                    <span class="font-medium mr-2">ADRESSE</span>
                    <span>Imm Larki, 2eme Etage, Blachache M'haita - Taroudannt</span>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let Select1 = document.getElementById("select1");
    let Select2 = document.getElementById("select2");
    let select1Elements = document.getElementById("select1Elements");
    let select2Elements = document.getElementById("select2Elements");
    select1Elements.style.display = "none";
    select2Elements.style.display = "none";
    function checkChoise() {
        switch (Select1.value) {
            case "null":
                console.log("this is null");
                break;
            case "Offre d'emploi":
                console.log("1");
                loadSelect2(
                    [   "Département d'Audit  contrôle gestion et audit interne",
                        "Département  d’informatique",
                        "Département d'Hygiène Sécurité Environnement ",
                        "Département d'administration et finance",
                        "Département gestion matériel",
                        "Département de la comptabilité",
                        "Département de finance",
                        "Département administratif et juridique",
                        "Département administratif des ventes",
                        "Département de ressources humaines",
                        "Département d'achats",
                        "Département Gestion Matériels",
                        "Département d'atelier",
                        "Département bureau méthode maintenance",
                        "Département logistique",
                        "Département d'exploitation",
                        "Département d'étude des prix",
                        "Département topographe",
                        "Département administration marchés publiques"
                    ]);
                break;
            case "Offre de stage":
                console.log("2");
                loadSelect2(["DS1", "DS2", "DS3", "DS4"]);
                break;
            case "Candidature spontanée":
                console.log("3");
                loadSelect2(["Stage", "Emploi"]);
                break;
        }
    }

    function showSelect1(){
        select1Elements.style.display == "none" ? select1Elements.style.display = "block" : select1Elements.style.display = "none";
    }

    function showSelect2(){
        select2Elements.style.display == "none" ? select2Elements.style.display = "block" : select2Elements.style.display = "none";
    }
    
    document.onclick = function(e){
        if(e.target.id !== 'select1')select1Elements.style.display = "none";
        if(e.target.id !== 'select2')select2Elements.style.display = "none";
    };

    function select1(value) {     
        Select1.value = value;
        Select1.style.backgroundColor ="white";
        Select1.style.opacity ="85%";
        Select2.value = "";
        checkChoise();
    }
    function loadSelect2(elements){
        let ul = select2Elements.firstElementChild;
        let child = ul.firstElementChild; 
        while (child) {
            ul.removeChild(child);
            child = ul.firstElementChild;
        }

        elements.forEach(element=>{
            let li = document.createElement("li");
            li.innerHTML = element;
            li.className = "border-b cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded";
            li.onclick = ()=>{
                Select2.value = element;
                Select2.style.backgroundColor ="white";
                Select2.style.opacity ="85%";
            }
            ul.appendChild(li);
        })
    }
</script>

</html>