<!doctype html>
<html lang="pt-br">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awsome -->
    <script src="https://kit.fontawesome.com/06c083b33f.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(164.92deg, #31508B 31.08%, rgba(72, 88, 210, 0.69) 119.53%);
            background-attachment: fixed;
            min-height: 100%;
            text-align: center;
        }
        .wrapper {
            text-align: center;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <form action=" {{route('secretaria.password.update')}} " method="POST">
            <label for="password">Insira a nova senha: </label>
            <input type="password" name="password" id="">
            <label for="password_confirmation">Confirme a nova senha: </label>
            <input type="password" name="password_confirmation" id="">
            <input type="hidden" name="email" value="secretaria@ic.ufal.br">
            <input type="hidden" name="token" value="{{$token}}">
        </form>
    </div>
</body>
</html>