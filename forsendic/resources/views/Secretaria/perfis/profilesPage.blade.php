<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link href="{{asset('css/secretaria/style_perfis.css')}}" rel="stylesheet" />
  </head>
  <body>

  <!-- START HEADER -->    
  <div class="page-header text-center">
      <div class="logo-wrapper">
        <img src="{{asset('/images/Logo_clara.png')}}" width="180" />
      </div>
      <div class="ufal-logo">
        <img src="{{asset('/images/Ufal_white.png')}}" width="100" height="100" />
      </div>
      <div class="header-title">
        <h2><strong>Quem está acessando?</strong></h2>
      </div>
    </div>
    <!-- END HEADER -->

    <main>
      <!-- PERFIS APARECEM AQUI -->
      <div
        class="d-flex justify-content-center flex-wrap w-75 perfis-container"
        id="flex-container"
        style="margin: auto">
        @unless (count($secretarios) == 0)
        
        @foreach ($secretarios as $secretario)
          <div class="perfil">
          <a href="/secretaria/dashboard/{{$secretario->id}}">
            <img class="circle" src="{{$secretario->photo ? asset('storage/' . $secretario->photo) : asset('/images/admin.png')}}" alt="" srcset="">
          </a>
          <p>{{$secretario->name}}<p>
          </div>
        @endforeach
        
        @else
        <div class="perfil" id="noUsers">
          <div class="circle"></div>
        <p>Sem usuários</p>
        </div>
        @endunless
      </div>
      
      <!-- BOTÃO DE ADICIONAR AQUI -->
        <form action="{{route('secretaria.novoPerfil')}}" method="GET">
          <div class="d-flex justify-content-center">
            <button
              id="addBtn"
              class="botao-acessar btn"
              data-bs-toggle="modal"
              data-bs-target="#">
              Adicionar novo perfil
            </button>
          </div>
        </form>
        {{-- <p>{{$message}}</p> --}}
      </main>

    <footer><strong>Todos os direitos reservados</strong></footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>