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
    <link href="{{asset('css/secretaria/style_dashboard.css')}}" rel="stylesheet" />
  </head>
  <body>
    <!-- modal -->
    <div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="Modal forms" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Desitência de Vínculo Total de Curso</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul class="list-group lista-modal">
              <li><strong>Aluno</strong>: Hélder Silva Ferreira Lima</li>
              <li><strong>Email</strong>: helder@ic.ufal.br</li>
              <li><strong>Matricula</strong>: 123456789</li>
              <li><strong>Data de Envio</strong>: 25/05/2022</li>
              <li><strong>Status</strong>: Recebido</li> 
              <li>
                <button class="upload btn botao-acessar"><i class="fa-solid fa-download"></i> Arquivos</button>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle botao-acessar" id="botao-drop" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Alterar Status
                  </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Recebido</a></li>
                      <li><a class="dropdown-item" href="#">Enviado</a></li>
                      <li><a class="dropdown-item" href="#">Concluído</a></li>
                    </ul>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  

    <!-- start navbar -->
    <div class="sidebar">
            <img src="{{asset('/images/Logo_ForsendIC.png')}}" width="180">
        <div class="perfil-dash">
            <div class="circle"></div>
            <h4>Bem-vindo, usuário!</h4>
            <form method="post" action="{{route('secretaria.logout')}}">
              @csrf
              <button class="botao-acessar btn btn-primary" type="submit">Sair</button>
            </form>
        </div>
    </div>
    <!-- end navbar -->

  <main>
    <header id="dash-header">
        <h2 class="branco">Situação de formulários</h2>
    </header>
    <!-- table -->
    <div class="content">
        
      <!-- SEARCH BAR  -->
        <div class="form-wrapper">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Nome, tipo, status..." aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="submit-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
      <!-- END SEARCH BAR -->
          
      <!-- FILTROS -->
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Demandas
        </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Tudo</a></li>
            <li><a class="dropdown-item" href="#">Desistência de Vínculo Total</a></li>
            <li><a class="dropdown-item" href="#">Trancamento da matrícula</a></li>
            <li><a class="dropdown-item" href="#">Rematrícula</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Status
          </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Tudo</a></li>
              <li><a class="dropdown-item" href="#">Recebidos</a></li>
              <li><a class="dropdown-item" href="#">Enviados</a></li>
              <li><a class="dropdown-item" href="#">Concluídos</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <!-- END FILTROS -->
        <div class="grid-wrapper">
          <div class="grid-cell">
            <ul>
              <li>
                <h5>Hélder Silva Ferreira Lima</h5>
              </li>
              <li>
                <h6>123456789</h6>
              </li>
              <li>
                <strong>Data de envio: </strong> 24/05/2022
              </li>
              <li>
                <strong>Demanda</strong>: Desitência de Vínculo Total de Curso
              </li>
              <li>
                <span class="status status-recebido">Recebido</span>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="open-form-button">Visualizar</button>
              </li>
            </ul>
          </div>
          <div class="grid-cell">
            <ul>
              <li>
                <h5>Hélder Silva Ferreira Lima</h5>
              </li>
              <li>
                <h6>123456789</h6>
              </li>
              <li>
                <strong>Data de envio: </strong> 24/05/2022
              </li>
              <li>
                <strong>Demanda</strong>: Desitência de Vínculo total de Curso
              </li>
              <li>
                <span class="status status-enviado">Enviado</span>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="open-form-button">Visualizar</button>
              </li>
            </ul>
          </div>
          <div class="grid-cell">
            <ul>
              <li>
                <h5>Hélder Silva Ferreira Lima</h5>
              </li>
              <li>
                <h6>123456789</h6>
              </li>
              <li>
                <strong>Data de envio: </strong> 24/05/2022
              </li>
              <li>
                <strong>Demanda</strong>: Desitência de Vínculo total de curso
              </li>
              <li>
                <span class="status status-enviado">Enviado</span>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="open-form-button">Visualizar</button>
              </li>
            </ul>
          </div>
          <div class="grid-cell">
            <ul>
              <li>
                <h5>Hélder Silva Ferreira Lima</h5>
              </li>
              <li>
                <h6>123456789</h6>
              </li>
              <li>
                <strong>Data de envio: </strong> 24/05/2022
              </li>
              <li>
                <strong>Demanda</strong>: Desitência de Vínculo total de curso
              </li>
              <li>
                <span class="status status-concluido">Concluido</span>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="open-form-button">Visualizar</button>
              </li>
            </ul>
          </div>
          
        </div>
      </div>
      <!--rodape-->
      <footer>
        <img class="ufal navbar-brand" src="{{asset('/images/ufal.png')}}" width="80" height="80">    
        <strong>Todos os direitos reservados</strong>
      </footer>
    </main>
    <!-- end table -->
    

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>