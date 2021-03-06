<!DOCTYPE html>
<html class="h-screen" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$username}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
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

        .small-width{
            width : 14%;
        }
        .big-width{
            width : 82%;
        }
        @media only screen and (min-width: 1650px) {
            .small-width{
            width : 11%;
            }
            .big-width{
            width : 85%;
            }
        }
        pre {
            white-space: pre-wrap;       /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
            white-space: -pre-wrap;      /* Opera 4-6 */
            white-space: -o-pre-wrap;    /* Opera 7 */
            word-wrap: break-word;       /* Internet Explorer 5.5+ */
            font-size: 17px;
        }
    </style>
</head>

<body class="h-screen background-img">
<div class="h-full w-full flex-col">
    <div class="text-sm sticky top-0 bg-gray-500 bg-opacity-90 z-50 flex w-full">
        <a class="flex-1" href="/createJob">
        <div>   
            <div class="menu shadow  @if($view == "createJobs") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r border-opacity-5">                        
                Offre emploi
            </div>
        </div>
        </a>
        <a class="flex-1" href="/createInternship">
            <div class="menu shadow @if($view == "createInternships") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                Offre stage
            </div>
        </a> 
        <a class="flex-1" href="/BDemploi">    
            <div class="menu shadow @if($view == "jobs") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                BD emploi
            </div>
        </a> 
        <a class="flex-1" href="/BDstage">   
            <div class="menu shadow @if($view == "internships") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                BD stage
            </div>
        </a> 
        <a class="flex-1" href="/BDspontaneous"> 
            <div class="menu shadow @if($view == "spontaneous") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r">
                Candidatures spontan??e
            </div>
        </a> 
        <a class="flex-1" href="/settings"> 
            <div class="menu shadow  @if($view == "settings") bg-yellow-500 @endif hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4 border-r border-opacity-25">
                Param??tres
            </div>
        </a>
        <a class="flex-1" href="/logout">
            <div class="menu shadow  hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold text-center p-4">
                D??connexion
            </div>
        </a>
    </div>
    <div style="height:90.3%;" class="mt-2 flex justify-center box-border">
        @yield("main")
    </div>
</div>
</body>

</html>