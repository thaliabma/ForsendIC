@props(['demanda'])

@if ($demanda === 'desistencia')
Desistência de Vínculo Total de Curso
@elseif ($demanda === 'rematricula')
Rematrícula
@elseif ($demanda === 'trancamento')
Trancamento de Matrícula de Disciplina
@endif