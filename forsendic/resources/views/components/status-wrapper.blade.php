@props(['status'])

@if ($status === 'Recebido')
    <span class="status status-recebido">Recebido</span>
@elseif($status=== 'Enviado')
    <span class="status status-enviado">Enviado</span>
@elseif($status === 'Deferido')
    <span class="status status-concluido">Deferido</span>
@elseif ($status === 'Indeferido')
    <span class='status status-indeferido'>Indeferido</span>
@endif