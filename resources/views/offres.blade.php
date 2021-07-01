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
            background: url('img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 94%;
        }
        .wrapper{
            background-color : rgba(255,255,255,10%); 
        }
        .offre{
            background-color : rgba(255,255,255,75%); 
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
}
        
    </style>
</head>

<body class="background-img relative h-full">

    @if(count($result)>0)
    <div class =" flex justify-center w-full absolute p-4">
        <div class="wrapper p-10 pt-0 rounded flex-col w-2/3">
        @foreach($result as $r)
        <div class="offre w-full mt-10 shadow-2xl rounded p-4">
            <div class="flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Poste :
                </label>
                {!!$r->Offre!!}
            </div>
        <br>
            <div class="flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Direction :
                </label>
               {!!$r->Direction!!}
            </div>
        
        <br>
            <div class="flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Sexe">
                Département :
                </label>
               {!!$r->Département!!}
            </div>

        <br>
        {!!$r->Description!!}
        <br>

        @if($type == "emploi")
        <a href="/formulaireEmploi/{!!$r->id!!}">
        @endif
        @if($type == "stage")
        <a href="/formulaireStage/{!!$r->id!!}">
        @endif
            <button  class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">          
            Postuler
            </button>
        </a>
        </div>
        @endforeach
        </div>
    </div>
    @endif

</body>

</html>