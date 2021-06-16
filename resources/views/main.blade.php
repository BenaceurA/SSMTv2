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
        select {

            background-color: rgba(255, 255, 255, 75%);
            border: none;
            padding: 0 1em 0 0;
            margin: 0;
            width: 100%;
            font-family: inherit;
            font-weight:normal;
            font-size: inherit;
            line-height: inherit;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            background-color: rgba(255, 255, 255);
        }
    </style>
</head>

<body class="relative h-full">
    <div class="h-screen flex-col">
        <div class="absolute text-white">
        </div>
        <div class="absolute h-screen w-screen flex-wrap flex justify-center content-center">
            <div class=" h-auto flex justify-center" style="width: 50%;">
                <form class="flex justify-center" style="width: 100%;" action="/search" method="POST">
                    @csrf
                    <div class="inline mr-2 " style="width: 40%;">
                        <select onchange="checkChoise()" class="shadow-lg rounded py-2 px-5 " name="select1" id="select1">
                            <option selected hidden disabled value="null">Qu'est-ce que tu cherches ?</option>
                            <option value="Offre d'emploi">Offre d'emploi</option>
                            <option value="Offre de stage">Offre de stage</option>
                            <option value="Candidature spontanée">Candidature spontanée</option>
                        </select>
                    </div>
                    <div class="inline mr-2 " style="width: 40%;">
                        <select class="shadow-lg rounded py-2 px-5 " name="select2" id="select2">
                            <option selected hidden disabled value="null">Quel département</option>
                        </select>
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
window.addEventListener("pageshow", () => {
  document.getElementById("select1").selectedIndex = 0;
  document.getElementById("select2").selectedIndex = 0;
});
    function checkChoise() {
        let select1 = document.getElementById("select1");

        switch (select1.value) {
            case "null":
                console.log("this is null");
                break;
            case "Offre d'emploi":
                console.log("1");
                loadSelect2(["DE1", "DE2", "DE3", "DE4"]);
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

    function loadSelect2(Choix) {
        let select2 = document.getElementById("select2");
        let options2 = document.getElementsByClassName("options2");
        select2.disabled = false;
        for (let i = 0; i < options2.length; i++) {
            while (options2.length > 0) {
                options2[0].parentNode.removeChild(options2[0]);
            }
        }

        for (let i = 0; i < Choix.length; i++) {
            const element = Choix[i];
            let option = document.createElement("option");
            option.innerHTML = element;
            option.value = element;
            option.className = "options2";
            select2.appendChild(option);
        }
    }
</script>

</html>