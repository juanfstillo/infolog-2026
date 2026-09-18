<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Infolog Argentina') — Infolog</title>
    <meta name="description" content="@yield('description', 'Infolog gestiona, preserva y moderniza el Archivo Técnico Avellaneda de YPF: el archivo de exploración petrolera más grande de Sudamérica.')">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper text-navy-900">

    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')

</body>
</html>
