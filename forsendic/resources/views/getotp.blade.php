@yield('email')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <x-imports></x-imports>
    <link href="{{asset('css/style_cadastroAluno.css')}}" rel="stylesheet" />
    <title>Acesso Aluno</title>
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
          <p class="titulo-entidade">Senha enviada</p>
          <p class="dados">Insira-a abaixo</p>
          <form method="POST" action="{{route('aluno.check')}}">
            @csrf
            {{-- <h3>Insira a sua otp</h3> --}}
            <input
              type="password"
              class="form-senha form-control mb-3"
              id="inputPassword"  
              name="password"
            />
            
            @error('password')
              {{$message}}
            @enderror
            {{-- <p>Seu email: {{$email}}</p> --}}
            <input type="hidden" name="email" value="{{$email}}">
            <button class="botao-acessar btn" type="submit">Entrar</button>
          </form>
          <span class="text-danger">@error('password') {{$message}} @enderror</span>
          <span class="text-danger">@error('email') {{$message}} @enderror</span>
          {{-- @if('status')
            <div style="background-color: black;color:white">
                {{$status}}
            </div>
          @endif --}}
          {{-- <a href="{{'/alunos'}}"><button class="botao-acessar btn">Solicitar chave</button></a> --}}
        </div>
      </div>
    </div>

    <script src="/bootstrap5.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
