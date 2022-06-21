<!doctype html>
<html lang="pt-br">
  <head>
    <title>Redefinir Senha</title>
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
            height: 100vh;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{

        }
        .header{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .config{
            width: 40%;
        }
        .butao{
            width: 35%;
            background: #31508B;
        }
        .submit{
            display: flex;
            justify-content: center;
        }

    </style>
<body>
        <div class=" config card">
            <div class=" header card-header">
                        <img
                              src="{{asset('images/Logo_ForsendIC.png')}}"
                              alt="Logomarca do ForsendIC"
                              style="width: 40%; height: 40%; margin-top: 2%;margin-bottom: 2%"
                            />
                        {{ __('Redefinir a senha') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="email" type="hidden" @error('email') is-invalid @enderror" name="email" value="secretaria@ic.ufal.br" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nova senha: ') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirme a nova senha:') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="submit row mb-0">
                                    <button type="submit" class="butao btn btn-primary">
                                        {{ __('Redefinir senha') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
</body>
