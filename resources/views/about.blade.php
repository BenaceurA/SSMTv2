<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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
        <div class="flex justify-center mt-24">
            <div class="my-8 p-8 rounded bg-white bg-opacity-90 w-11/12 lg:w-10/12 xl:w-9/12 2xl:w-7/12">
                <p class="text-lg mb-8">
                    La société SSMT est une SARL créée en 2003, sa stratégie est basée sur l’octroi d’un espace de travail
                    sain et sécurisé pour ses collaborateurs, et sur le respect de l’environnement vue que, pour nous,
                    Hommes et machines sont notre capital inestimable. Nos deux activités principales sont la Route et
                    les Matériaux.
                </p>
                <p class="text-lg mb-8">
                    L’activité permanente de notre société s’appuie sur des ressources humaines bien formées, comme
                    nous mobilisons aujourd’hui un parc d’engins à la pointe de la technologie.
                </p>
                <p class="text-lg mb-8">
                    Notre vocation est d’être le leader national du secteur routier, grâce à l’effort constant de notre
                    management et de nos équipes.
                </p>
                <p class="text-lg mb-8">
                    Notre mission principale est de construire et entretenir l’infrastructure routière avec esprit de
                    responsabilité, via notre présence et notre réputation à travers tout le territoire marocain.
                </p>
                <p class="text-lg">
                    Notre but est de participer à la liaison des régions de notre pays, afin de permettre une circulation
                    fluide des Hommes et des Biens.
                </p> 
            </div>       
        </div>
    </div>
    @include("top-bar"); 
</body>
</html>