<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <x-imports></x-imports>
    <link href="{{asset('css/style_inicio.css')}}" rel="stylesheet" />
    <title>Inicio</title>
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
          src="/assets/Logo_ForsendIC.png"
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
      <div
        class="caixa-azul d-flex justify-content-evenly flex-column align-items-center"
      >
        <div class="caixa-cinza">
          <p class="titulo-entidade">Acesso Administrativo</p>
          <p class="tipo-acesso">
            Somente usuários da secretaria do Instituto de Computação
          </p>
          <a
            class="botao-acessar btn btn-sm"
            href="{{route('secretaria.login')}}"
            role="button"
            >Acessar</a
          >
          <img
            
            src="{{asset('images/Admin.png')}}"
            alt="desenho de um predio"
            class="imgAcesso"
          />
        </div>
        <div class="caixa-cinza">
          <p class="titulo-entidade">Acesso Aluno</p>
          <p class="tipo-acesso">Para alunos do Instituto de Computação</p>
          <a
            class="botao-acessar btn btn-sm"
            href="{{route('aluno.solicitar')}}"
            role="button"
            >Acessar</a
          >
          @isset($status)
              {{$status}}
          @endisset
          <img
            src="{{asset('images/Aluno.png')}}"
            alt="desenho de um predio"
            class="imgAcesso"
          />
        </div>
      </div>
    </div>

    <script src="/bootstrap5.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
