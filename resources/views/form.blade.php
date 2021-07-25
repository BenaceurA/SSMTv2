<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css',true) }}" rel="stylesheet">
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
    </style>
</head>

<body class="relative h-screen background-img">
    <div class="text-sm md:text-sm lg:text-base mb-8 mt-16 flex justify-center ">
         @if($type == "emploi") @include("formemploi");
         @elseif($type == "stage") @include("formstage");
         @elseif($type == "spontaneous") @include("formspontaneous"); @endif
    </div>
    <div id="navbar" class="top-0 fixed text-white bg-opacity-90 bg-black w-full" style="height: 7%;">
        <div class="w-full h-full flex justify-center mt-auto">
            <div class="flex justify-between w-9/12 h-full mt-auto mb-auto">
                <a class="flex" href="/"><img class="mt-auto mb-auto" id="logo" src="{{ asset('../img/logo.png') }}"></a>
                <div class = "cursor-pointer mt-auto mb-auto">
                    <a class="">À propos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-0 fixed text-white bg-black w-full" style="height: 4%;">
        <div class="h-full flex justify-center mt-auto">
            <div class="text-xs md:text-sm lg:text-base mt-auto mb-auto">
                <span class=" mr-2">ADRESSE</span>
                <span>Imm Larki, 2eme Etage, Blachache M'haita - Taroudant</span>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>

</html>