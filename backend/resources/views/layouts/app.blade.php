<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multilab App</title>
    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/5980929ce4.js" crossorigin="anonymous"></script>
    {{-- Styles --}}
    {{-- TODO: Extract code to css file --}}
    <style>
        html {
            overflow-y: auto;
        }

        table {
            margin: auto;
        }
    </style>
    {{-- @vite(['resources/js/app.js']) --}}
</head>
<body>

    @include('partials.nav')

    <main>
        @yield('content')
    </main>
</body>
</html>