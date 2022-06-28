<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForsendIC - Secretaria</title>
</head>
<body>
    <h1>Formulario recebido</h1>
    <ul>
        <li>{{$formulario->aluno_nome}}</li>
        <li>{{$formulario->aluno_matricula}}</li>
        <li>{{$formulario->aluno_email}}</li>
        <li>{{$formulario->demanda}}</li>
        <li>{{$formulario->status}}</li>
        @if (is_null($formulario->editado_por))
            <li>O formulario não foi editado ainda</li>
        @else
            <li>Última edição feita por: {{$secretario->name}}</li>
        @endif
    </ul>

    <a href="/secretaria/formulario/download/{{$formulario->id}}">Clique aqui para baixar o formulário</a>
    <h2>Caso haja algum erro na solicitação do discente{{_(' (documento em falta, assinatura etc)')}}, clique aqui para enviar-lhe um email</h2>

</body>
</html>