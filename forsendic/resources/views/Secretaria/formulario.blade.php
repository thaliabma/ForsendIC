<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForsendIC - Secretaria</title>
    <x-imports />
</head>
<body>
    <x-flash-message />
    @error('texto')
        <x-flash-message :message="$message" />
    @enderror
    <h1>Formulario recebido</h1>
    <ul>
        <li>Nome: {{$formulario->aluno_nome}}</li>
        <li>Matrícula: {{$formulario->aluno_matricula}}</li>
        <li>Email: {{$formulario->aluno_email}}</li>
        <li>Demanda: {{$formulario->demanda}}</li>
        <li>Status: {{$formulario->status}}</li>
        @if (is_null($formulario->editado_por))
            <li>O formulario não foi editado ainda</li>
        @else
            <li>Última edição feita por: {{$editor->name}}</li>
        @endif
    </ul>

    <a href="/secretaria/formulario/download/{{$formulario->id}}">Clique aqui para baixar o formulário</a>
    <h2>Caso haja algum erro na solicitação do discente{{_(' (documento em falta, assinatura etc)')}}, clique <button id="emailBtn">aqui</button> para enviar-lhe um email</h2>
    
    <div id="divEmail"></div>

    <h2>Caso esteja na hora de mudar o status do formulário, clique aqui</h2>
    <div id="divStatus">
        <form method="post" action="/secretaria/formulario/{{$formulario->id}}/status">
            @csrf
            @method('PUT')
            <fieldset>
                <legend>Selecione o status:</legend>
            
                <div>
                  <input type="radio" name="status" value="Recebido"
                         @if ($formulario->status === 'Recebido')
                             checked   
                         @endif>
                  <label>Recebido</label>
                </div>
            
                <div>
                  <input type="radio" name="status" value="Enviado"
                    @if ($formulario->status === 'Enviado')
                        checked   
                    @endif>
                  <label>Enviado</label>
                </div>
            
                <div>
                  <input type="radio" id="louie" name="status" value="Concluido"
                    @if ($formulario->status === 'Concluído')
                        checked   
                    @endif>
                  <label>Concluído</label>
                </div>
            </fieldset>
            @error('status')
                {{$message}}
            @enderror
            <input type="hidden" name="editado_por" value="{{$secretario->id}}">
            @error('editado_por')
                {{$message}}
            @enderror
            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        const emailBtn = document.getElementById('emailBtn');
        const divEmail = document.getElementById('divEmail');
        
        emailBtn.addEventListener('click', function showEmailForm() {
            divEmail.insertAdjacentHTML('afterbegin',`
            <form action="{{route('secretaria.erroEmail')}}" method="post">
            @csrf
            <label for="texto">Descreva os erros encontrados na documentação: </label>
            <input type="text" name="texto" autofocus>
            <input type="hidden" name="aluno_email" value="{{$formulario->aluno_email}}">
            <button type="submit">Enviar</button>
        </form>`);
        emailBtn.removeEventListener('click', showEmailForm);
        });
    </script>
</body>
</html>