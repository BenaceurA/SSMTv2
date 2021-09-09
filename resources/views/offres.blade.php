<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .wrapper{
            
        }
        .offre{
            {{-- background-color : rgba(255,255,255,80%);  --}}
        }
        ul{
            list-style-type: disc; 
            list-style-position: inside; 
            margin-top:15px;
            margin-left:15px;
        }
        ol { 
            list-style-type: decimal; 
            list-style-position: inside; 
            margin-top:15px;
            margin-left:15px;
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
        pre {
            white-space: pre-wrap;       /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
            white-space: -pre-wrap;      /* Opera 4-6 */
            white-space: -o-pre-wrap;    /* Opera 7 */
            word-wrap: break-word;       /* Internet Explorer 5.5+ */
        }
        label::after{
            content : ":";
        }
    </style>
</head>

<body class="w-screen relative h-screen background-img">

    @if(count($result)>0)
    <div class =" flex justify-center w-full absolute">
        <div class="mt-48 md:mt-48 wrapper pb-5 pt-0 rounded flex-col max-w-full w-4/5 md:w-3/5 lg:w-3/5">
        @foreach($result as $r)
        <div onclick="expand(this)" class="h-44 sm:h-44 md:h-40 bg-white bg-opacity-90 hover:bg-opacity-100 overflow-hidden  cursor-pointer offre w-full mt-10 shadow-2xl rounded p-4">
            <div class="flex">
                <label class="block text-gray-600 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Poste
                </label>
                {!!$r->Offre!!}
            </div>
            <br>
            <div class="flex">
                <label class="block text-gray-600 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Direction
                </label>
               {!!$r->Direction!!}
            </div>
        
            <br>
            <div class="flex">
                <label class="whitespace-nowrap block text-gray-600 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Département
                </label>
               {!!$r->Département!!}
            </div>

            <div class="mt-6 mb-6 max-w-full">
            <br>
            {!!$r->Description!!}
            <br>
            </div>
            @if($type == "emploi")
            <a href="/formulaireEmploi/{!!$r->id!!}">
            @endif
            @if($type == "stage")
            <a href="/formulaireStage/{!!$r->id!!}">
            @endif
            <button onclick="event.stopPropagation()"  class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">          
            Postuler
            </button>
            </a>
        </div>
        @endforeach
        </div>
    </div>
    @else
    <div class="flex justify-center w-full absolute">
        <div class="my-40 py-2 px-4 rounded text-sm md:text-sm lg:text-base text-white bg-opacity-95">
            Aucune offre n’est disponible actuellement.
        </div>
    </div>
    @endif

    @include("top-bar")

</body>
<script>
    function expand(e){
        e.classList.toggle("md:h-40");
        e.classList.toggle("sm:h-44");
        e.classList.toggle("h-44");
        e.classList.toggle("bg-opacity-90");
    }

</script>
</html>