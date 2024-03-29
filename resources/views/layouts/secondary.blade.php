<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js'])
    @stack('styles')

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="EstanteDev" />
    <title>@yield('title') | EstanteDev</title>
</head>

<body>
    @yield('content')
</body>

</html>
