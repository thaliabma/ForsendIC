@props(['form', 'secretario'])

<div class="grid-cell">
    <ul>
      <li>
        <h5>{{$form->aluno_nome}}</h5>
      </li>
      <li>
        <h6><strong>Matrícula</strong>: {{$form->aluno_matricula}}</h6>
      </li>
      <li>
        <strong>Data de envio</strong>: {{date('d-m-Y', strtotime($form->created_at))}}
      </li>
      <li>
        <strong>Demanda</strong>: 
        <x-status-wrapper :status="$form->status" />
      </li>
      <li>
        <a type="button" class="blank-link" href="/secretaria/{{$secretario->id}}/formulario/{{$form->id}}"><i class="fa-solid fa-file"></i> Visualizar</a>
      </li>
    </ul>
  </div>