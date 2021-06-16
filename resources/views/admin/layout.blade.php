<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <style>
        .background-img {
            background: url('../img/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100%;
        }
        .menu{
            cursor :pointer;
            border-right: 1px solid rgba(255, 255, 255, .3);
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #eeeeee;
            text-align: left;
            padding: 8px;
        }


    </style>
</head>

<body class="h-screen w-screen background-img">
<div class="h-full w-full flex-col">
    <div class=" flex w-full">
        <a class="flex-1" href="/create">
        <div>   
            <div class="menu shadow  @if($view == "create") bg-yellow-500 @endif hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r border-opacity-5">                        
                Offre emploi
            </div>
        </div>
        </a>
        <a class="flex-1" href="">
            <div class="menu shadow  hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                Offre stage
            </div>
        </a> 
        <a class="flex-1" href="/jobs">    
            <div class="menu shadow  @if($view == "jobs") bg-yellow-500 @endif hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                BD emploi
            </div>
        </a> 
        <a class="flex-1" href="">   
            <div class="menu shadow  hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                BD stage
            </div>
        </a> 
        <a class="flex-1" href=""> 
            <div class="menu shadow  hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                Candidature spontanée
            </div>
        </a> 
        <a class="flex-1" href=""> 
            <div class="menu shadow  hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r border-opacity-25">
                Paramètres
            </div>
        </a>
        <a class="flex-1" href="/logout">
            <div class="menu shadow  hover:bg-yellow-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4">
                Dèconnexion
            </div>
        </a>
    </div>
    <div class="flex p-3 box-border w-full">
        @yield("main")
    </div>
</div>
</body>

</html>