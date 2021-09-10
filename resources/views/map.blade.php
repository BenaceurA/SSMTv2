<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSMT</title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
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
<body class="relative h-screen w-screen background-img">
    <div class="flex flex-col justify-center h-full">
        <div class="flex justify-center w-auto mt-36">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m8!1m3!1d13753.202141059333!2d-9.2567561!3d30.4842441!3m2!1i1024!2i768!4f13.1!4m7!3e0!4m0!4m4!1s0xdb3d578031b0763%3A0x49cc675a82142c75!3m2!1d30.4858999!2d-9.2700251!5e0!3m2!1sen!2sma!4v1631203930441!5m2!1sen!2sma" width="1024" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    @include("top-bar")
</body>