<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        
        .background-img {
            background: url('img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100vh;
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
<body class="relative text-sm md:text-base lg:text-base background-img h-full">
    <div class="sm:flex md:flex lg:flex flex-col justify-center h-full w-full absolute">
        <div onclick="redirectTo('/')" class="flex justify-center mt-20">
            <div onclick="event.stopPropagation()" class="my-8 p-8 rounded bg-black text-gray-200 border-2 border-yellow-500 bg-opacity-50 w-11/12 lg:w-10/12 xl:w-9/12 2xl:w-7/12" style="font-family:'Arial'">
                <p class="text-lg mb-8">
                    La soci??t?? SSMT est une SARL cr????e en 2005, sa strat??gie est bas??e sur l???octroi d???un espace de travail
                    sain et s??curis?? pour ses collaborateurs, et sur le respect de l???environnement vue que, pour nous,
                    Hommes et machines sont notre capital inestimable. Nos deux activit??s principales sont la Route et
                    les Mat??riaux.
                </p>
                <p class="text-lg mb-8">
                    L???activit?? permanente de notre soci??t?? s???appuie sur des ressources humaines bien form??es, comme
                    nous mobilisons aujourd???hui un parc d???engins ?? la pointe de la technologie.
                </p>
                <p class="text-lg mb-8">
                    Notre vocation est d?????tre le leader national du secteur routier, gr??ce ?? l???effort constant de notre
                    management et de nos ??quipes.
                </p>
                <p class="text-lg mb-8">
                    Notre mission principale est de construire et entretenir l???infrastructure routi??re avec esprit de
                    responsabilit??, via notre pr??sence et notre r??putation ?? travers tout le territoire marocain.
                </p>
                <p class="text-lg">
                    Notre but est de participer ?? la liaison des r??gions de notre pays, afin de permettre une circulation
                    fluide des Hommes et des Biens.
                </p> 
            </div>       
        </div>
    </div>
    @include("top-bar")
    @include("bottom-bar")
    <script>
        function redirectTo(s){
            window.location.href = s;
        }
    </script>
</body>
</html>