<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/5980929ce4.js" crossorigin="anonymous"></script>
    <style>
        html {
            overflow-y: hidden;
        }
        .container-form {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-login {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <main class="container container-form">
        @yield('content')
    </main>
</body>
</html>