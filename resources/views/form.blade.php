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
    </style>
</head>

<body class="relative h-screen background-img">
    <div class="flex justify-center ">
         @if($type == "emploi") @include("formemploi");
         @elseif($type == "stage") @include("formstage");
         @elseif($type == "spontaneous") @include("formspontaneous"); @endif
    </div>
    <script>
    </script>
</body>

</html>