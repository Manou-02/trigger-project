<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Banques
    </title>
    <link rel = "icon" href ="https://cdn-icons-png.flaticon.com/512/195/195488.png" type = "image/x-icon">
    <script src="https://kit.fontawesome.com/1b278fb6b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset("css/app.css") }}>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <style>
        *{
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>
</head>
<body>


    <div class="flex ">
        <div class="sidebar flex-none w-64 h-full pt-4 bg-blue-900">
            @include('partials.sidebar')
        </div>
        <div class="flex-1">
            @include('partials.navbar')
            @yield('content')
        </div>
    </div>


    {{-- @include('partials.navbar')

    <div class="flex ">
        <div class="sidebar flex-none w-64 h-full pt-4 bg-blue-900">
            @include('partials.sidebar')
        </div>
        <div class="flex-1">
            @yield('content')
        </div>
    </div> --}}
</body>
</html>
