<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="EstanteDev" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title') | EstanteDev</title>
</head>

<body class="flex flex-col min-h-screen">
    @include('shared.header')

    <main class="grow">
        @yield('content')
    </main>

    @include('shared.footer')
</body>

</html>
