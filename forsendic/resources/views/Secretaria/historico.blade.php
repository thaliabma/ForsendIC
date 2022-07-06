<!doctype html>
<html lang="pt-br">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <x-imports></x-imports>    
    <link href="{{asset('css/secretaria/style_dashboard.css')}}" rel="stylesheet" />
  </head>
  <body>
    <!-- start navbar -->
    <x-sidebar :secretario="$secretario" :return="true" />
    <!-- end navbar -->
    
    <main>
      <header id="dash-header">
        <x-flash-message />
        <h2 class="branco">Situação de formulários</h2>
    </header>
    <!-- table -->
    <div class="content">
        
      <!-- SEARCH BAR  -->
        <form action="">
          <div class="form-wrapper">
            <div class="input-group mb-3">
              <input type="text" name="search" class="form-control" placeholder="Nome, tipo, status..." aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="submit-search"><i class="fa fa-search"></i></button>
              </div>
            </div>
        </form>
      <!-- END SEARCH BAR -->
          
      <!-- FILTROS -->
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Demandas
        </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/secretaria/dashboard/{{$secretario->id}}">Tudo</a></li>
            <li><a class="dropdown-item" href="?demanda=desistencia">Desistência de Vínculo Total</a></li>
            <li><a class="dropdown-item" href="?demanda=trancamento">Trancamento da matrícula</a></li>
            <li><a class="dropdown-item" href="?demanda=rematricula">Rematrícula</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- END FILTROS -->
    @unless (count($forms) === 0)
        <div class="grid-wrapper">
          @foreach ($forms as $form)

            <x-card-form :form="$form" :secretario="$secretario" />
          @endforeach
        </div>
          @else 
          <div class="no-forms">
            <p><strong>Não recebemos nenhum formulário. Continue o bom trabalho!</strong></p>
          </div>
    @endunless
          
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