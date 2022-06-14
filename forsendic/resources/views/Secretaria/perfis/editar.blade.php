<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar perfil</title>
    <x-imports></x-imports>
    <link href="{{asset('css/secretaria/style_perfis.css')}}" rel="stylesheet" />
    <style>
      main {
        background-color:linear-gradient(164.92deg, #31508B 31.08%, rgba(72, 88, 210, 0.69) 119.53%);;
        padding: 1rem;
        /* width: 80%; */
      }
      input {
        margin: 15px;
      }
      #legenda {
        color: white;
      }
      a {
        color:white;
        text-decoration:none;
      }
      a:hover {
        color: white;
        text-decoration: underline;
      }
    </style>
  </head>
  <body>

<div >
  <!-- START HEADER -->
    <div class="page-header text-center">
      <div class="logo-wrapper">
        <img src="{{asset('/images/Logo_clara.png')}}" width="180" />
      </div>
      <div class="ufal-logo">
        <img src="{{asset('/images/Ufal_white.png')}}" width="100" height="100" />
      </div>
      <div class="header-title">
        <h2><strong>Editar</strong></h2>
      </div>
    </div>
    <!-- END HEADER -->


  <div class="caixa">
    <main>
      <!-- FORM DE ADICIONAR AQUI -->
      <form action="/secretaria/perfil/{{$secretario->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="personal-image" >
            <label for="photo" > 
                <input type="file" name="photo" id="photo"/>
              <figure class="personal-figure">
                <img src="/images/admin.png" class="personal-avatar" alt="avatar">
                <p id="legenda">Foto</p>
              </figure>
              </label>
        </div>
        <label for="name"></label>
        <input type="text" name="name" class="form-control" value="{{$secretario->name}}"> <br>
        @error('name')
          <div class="alert alert-danger" role="alert" >
            {{$message}}
          </div>
        @enderror
        
        <button
          id="addBtn"
          class="botao-acessar btn"
          data-bs-toggle="modal"
          data-bs-target="#">
          Editar
        </button>
      </form>

      <div class="d-flex justify-content-center">
        <a href="/secretaria/dashboard/{{$secretario->id}}">
          <i class="fa-solid fa-house"></i> Voltar dashboard
        </a>
      </div>
      </main>
  </div>

    <footer><strong>Todos os direitos reservados</strong></footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</div>
  </body>
</html>