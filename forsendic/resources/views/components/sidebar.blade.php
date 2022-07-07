@props(['secretario', 'return'])

<div class="sidebar">
    <a href="/secretaria/perfil"><img src="{{asset('/images/Logo_ForsendIC.png')}}" width="180"></a>
<div class="perfil-dash">
  <img class="circle" src="{{$secretario->photo ? asset('storage/' . $secretario->photo) : asset('/images/admin.png')}}" alt="" srcset="">
  <!-- <h4>Bem-vindo, {{$secretario->name}}!</h4> -->
  <h4>{{$secretario->name}}</h4>

</div>

<div class="grid-cell d-flex flex-row justify-content-between align-items-center">
  <a class="icon-link" href="/secretaria/perfil/{{$secretario->id}}">
    <i class="fa-solid fa-pencil"></i> Editar
  </a>

  <form action="/secretaria/excluir/{{$secretario->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="icon-link" onclick="return confirm('Excluir o perfil?')"><i class="fa-solid fa-trash"></i> Excluir</button>
  </form>
</div>

@if ($return)
<div class="d-flex justify-content-center m-2">
    <a class="blank-link" href="/secretaria/dashboard/{{$secretario->id}}">
      <i class="fa-solid fa-house"></i> Dashboard
    </a>
</div>
@else
<div class="d-flex justify-content-center m-2">
  <a class="blank-link" href="/secretaria/historico/{{$secretario->id}}">
    <i class="fa-solid fa-folder-closed"></i></i> Histórico
  </a>
</div>
@endif

<form method="post" action="{{route('secretaria.logout')}}">
  @csrf
  <button class="botao-acessar btn btn-secondary" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</button>
</form>
</div>
