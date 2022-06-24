@props(['form'])

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
        @if ($form->demanda === 'desistencia') 
          Desistência de Vínculo Total de Curso
        @elseif($form->demanda === 'rematricula')
          Rematrícula
        @elseif($form->demanda === 'trancamento')
          Trancamento de Matrícula da Disciplina
        @endif
      </li>
      <li>
        @if ($form->status === 'Recebido')
          <span class="status status-recebido">Recebido</span>
        @elseif($form->status=== 'Enviado')
          <span class="status status-enviado">Enviado</span>
        @elseif($form->status === 'Concluído')
          <span class="status status-concluido">Concluido</span>
        @endif
        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="open-form-button">Visualizar</button>
      </li>
    </ul>
  </div>