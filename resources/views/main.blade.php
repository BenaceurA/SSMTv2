<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSMT</title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico',true)}}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css',true) }}" rel="stylesheet">

    
    <style>

        .background-img {
            background: url('img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height:100vh;
        }
        .select {
            appearance :none;
            background-color: rgba(255, 255, 255, 75%);
            border: none;
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
        input[type="text"]
        {
            font-weight:600;
        }
        .select::placeholder{
            color:black;
            opacity :0.9;
            font-weight:600;
        }
        .animate-down{
            top : 0px;
            animation-name: down;
            animation-duration: 1s;
        }
        .animate-up{
            top : -70px;
            animation-name: up;
            animation-duration: 1s;
        }
        @keyframes down{
            from {top: -70px;}
            to {top: 0px;}
        }
        @keyframes up{
            from {top: 0px;}
            to {top: -70px;}
        }
        .fade{
            animation-name: fade;
            animation-duration: 3s;
        }
        @keyframes fade{
            from{opacity:100%;}
            to{opacity:0%;}
        }
        #logo{
            image-rendering: pixelated;
            image-rendering: -moz-crisp-edges;         /* Firefox */
            image-rendering:   -o-crisp-edges;         /* Opera */
            image-rendering: -webkit-optimize-contrast;/* Webkit (non-standard naming) */
            image-rendering: crisp-edges;
            -ms-interpolation-mode: nearest-neighbor;
            max-width: auto;
            height: 90%;
        }
        @media (min-width: 640px) { 
            * {
            }
        }
    </style>
</head>

<body class="w-screen relative h-screen background-img">

    <div class="w-screen h-screen flex-col">
    
        <div class="absolute text-white">
        </div>
        
        <div class="min-w-full absolute h-screen w-screen flex-wrap flex justify-center content-center" style="font-family:'Rubik'">       
            <div id="status" class="top-36 sm:top-48 p-3 rounded  absolute" style="font-family:'Rubik','Arial';"></div>      

            <div class="w-11/12 lg:w-11/12 xl:w-10/12 2xl:w-8/12 h-auto flex justify-center mt-4">
                <form class="flex flex-col md:flex-row lg:flex-row justify-center w-full" onsubmit="return validateForm()" action="/search" method="POST" name="Form">
                    @csrf
                    <div class="z-10 relative inline mr-2 p-0 w-full mb-6 md:mb-0 lg:mb-0 md:w-2/5 text-md " >
                        <input onclick="showSelect1()" readonly placeholder="Qu'est-ce que tu cherches ?" class="select shadow-lg rounded py-2  px-5" type="text" name="select1" id="select1">
                        <div id="select1Elements" style="display:none;" class="font-semibold xl:bg-opacity-90 w-full bg-white absolute top-12 md:top-12 lg:top-12 right-0 rounded">
                            <ul>
                                <li onclick="select1('Offre d\'emploi')" class="border-b border-gray-300 cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Offre d'emploi</li>
                                <li onclick="select1('Offre de stage')" class="border-b border-gray-300 cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Offre de stage</li>
                                <li onclick="select1('Candidature spontanée')" class="border-b border-gray-300 cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded ">Candidature spontanée</li>
                            <ul>
                        </div>
                    </div>

                    <div class="relative inline mr-2 w-full mb-8 md:mb-0 lg:mb-0 md:w-2/5 text-md" >
                        <input onclick="showSelect2()" readonly placeholder="Quel département ?" class="select shadow-lg rounded py-2  px-5" type="text" name="select2" id="select2">
                        <div  id="select2Elements" class="font-semibold overflow-y-auto max-h-60 xl:bg-opacity-90 w-full bg-white absolute top-12 md:top-12 lg:top-12 right-0 rounded">
                            <ul>
                                
                            <ul>
                        </div>
                    </div>
                    
                    <button class="w-full md:w-1/5 lg:w-1/5 shadow-lg bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none font-bold text-white rounded py-2 px-auto " type="submit" value="Lancer">
                        Lancer
                    </button>
                </form>
            </div>
        </div>

        @include("top-bar")
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
                    [   
                        "Tous les départements",
                        "Audit contrôle gestion",
                        "Système d'information",
                        "Comptabilité",
                        "Ressources Humaines",
                        "Achats et stocks",
                        "Atelier",
                        "Maintenance",
                        "Logistique",
                        "Ingénierie de méthode",
                        "Etudes des prix",
                        "Chantier",
                    ]);
                break;
            case "Offre de stage":
                console.log("2");
                loadSelect2(
                    [
                        "Tous les départements",
                        "Audit contrôle gestion",
                        "Système d'information",
                        "Qualité Hygiène Sécurité Environnement",
                        "Comptabilité",
                        "Ressources Humaines",
                        "Achats et stocks",
                        "Finance",
                        "Gestion Administrative et juridique",
                        "Gestion Administrative des ventes",
                        "Atelier",
                        "Bureau de Méthode Maintenance",
                        "Logistique",
                        "Industries fixes",
                        "Bureau Ingénierie de méthode",
                        "Gestion des affaires",
                        "Chiffrage",
                        "Support",
                        "Administration des marchés publiques"
                    ]);
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
            li.className = "border-b border-gray-300 cursor-pointer hover:bg-gray-100 pl-4 pb-2 pt-2 rounded";
            li.onclick = ()=>{
                Select2.value = element;
                Select2.style.backgroundColor ="white";
                Select2.style.opacity ="85%";
            }
            ul.appendChild(li);
        })
    }

    function validateForm() {
        let select1 = document.forms["Form"]["select1"].value;
        let select2 = document.forms["Form"]["select2"].value;
        if (select1 == "") {
            return false;
        }
    }

    let url = new URL(window.location.href);
    let status = url.searchParams.get("status");
    if(status != null){
        let status = document.getElementById("status")
        status.innerHTML = "Votre candidature a bien été envoyée";
        status.classList.add("bg-yellow-500");
        setTimeout(()=>{       
            status.classList.add("fade");
            status.classList.add("opacity-0");
            },3000);    
    }

</script>

</html>