<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Auth | RuangKonsul')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">

    @stack('styles')
</head>

<body>
    @yield('content')

    @stack('scripts')
</body>
</html>
