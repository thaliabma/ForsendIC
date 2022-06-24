<!doctype html>
<html lang="pt-br">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <x-imports></x-imports>
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
        <form action=" {{route('password.update')}} " method="POST">
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
