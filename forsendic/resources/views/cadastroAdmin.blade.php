<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/style_cadastroAdmin.css')}}" rel="stylesheet" />
    <title>Acesso Administrativo</title>
  </head>
  <body>
    <div class="container-css d-flex flex-row">
      <div class="position-absolute m-lg-3">
        <img
          src="{{asset('images/ufal.png')}}"
          alt="Logo da Ufal"
          style="width: 114px; height: 113px"
        />
      </div>
      <div
        class="caixa-branca justify-content-center d-flex align-items-center flex-column"
      >
        <img
          src="{{asset('images/Logo_ForsendIC.png')}}"
          alt="Logomarca do ForsendIC"
          style="width: 60%; height: 17%"
        />
        <!-- <h1 class="display-1 center d-block">ForsendIC</h1> -->
        <p
          class="lead d-block"
          style="width: 60%; text-align: center; font-weight: inherit"
        >
          Controle de envio de formulários do Instituto de Computação da UFAL
        </p>
        <h6 class="position-relative" style="top: 12.5rem">
          Copyright © 2022 | Thalia, Murilo, Vinícius, Hélder e Pedro.
        </h6>
      </div>
      <div class="caixa-azul d-flex justify-content-center align-items-center">
        <div class="acesso-admin">
          <a href="{{'/'}}">
            <svg
  
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              fill="currentColor"
              class="bi bi-arrow-left-circle-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"
              />
          </a>
          </svg>
          <p class="titulo-entidade">Acesso Administrativo</p>
          <p class="dados">Informe sua senha</p>
          <form method="POST" action="{{route('secretaria.check')}}">
            @csrf
            <input
              type="password"
              class="form-senha form-control mb-3"
              id="inputPassword"
              name="password"
              placeholder="senha"
            />
            <input type="hidden" name="email" value="orfeowrk@gmail.com">
            <button class="botao-acessar btn" type="submit">Entrar</button>
            {{-- <a href="/Secretaria/profilesPage.html">.</a> --}}
          </form>
          {{-- <a href="{{'/secretaria/perfis'}}"><button class="botao-acessar btn">Entrar</button></a> --}}
          <span class="text-danger">@error('password') {{$message}} @enderror</span>
          
          <form action="{{route('secretaria.checkForgotPassword')}} " method="POST">
            @csrf
            <input type="hidden" name="email" value="orfeowrk@gmail.com">
            <input class="esquecer" type="submit" value="Esqueci minha senha">
          </form>
          
          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{session('status')}}
            </div>
            @endif

            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('email')}}</strong>
              </span>
            @endif
          </div>
        </div>
        </div>
      </div>
    </div>

    <script src="/bootstrap5.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
