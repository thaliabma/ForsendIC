<!doctype html>
<html lang="pt-br">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <x-imports></x-imports>    
    <link href="{{asset('css/secretaria/style_dashboard.css')}}" rel="stylesheet" />
    <style>
        .lista-form {
            text-align: center;
            font-size: 1.1rem;
            padding: 1rem;
        }

        .email-container {
            text-align: center;
        }

        .status-wrapper {
            padding:1rem;
        }

        .full-link {
            display:block;
            border-radius: 10px;
            line-height: 90%;
            width: 100%;
            text-align: center;
            margin: 1rem;
        }
        
        .hidden-form {
            background-color: white;
            text-align: justify;
            border: solid 2px; 
            border-color: rgb(243 244 246);
            border-radius: 5px;
            padding: 1rem;
            width: 70%;
        }
        .form-group {
            padding: 1rem;
        }

        #hidden-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main {
            text-align:center;
        }
    </style>
  </head>
  <body>
    <x-flash-message />
    <x-sidebar :secretario="$secretario" />
    <main>
        <header id="dash-header">
            <h2 class="branco">Formulário recebido</h2>
        </header>
        <div class="content grid-cell" id="main-form">
            <ul class="lista-form">
                <li><h1>{{$formulario->aluno_nome}}</h1></li>
                <li><strong>Matrícula</strong>: {{$formulario->aluno_matricula}}</li>
                <li><strong>Email</strong>: {{$formulario->aluno_email}}</li>
                <li><strong>Demanda</strong>: {{$formulario->demanda}}</li>
                <li><strong>Status</strong>: <x-status-wrapper :status="$formulario->status" /></li>
                @if (is_null($formulario->editado_por))
                    <li>Ainda não editado</li>
                @else
                    <li>Último Editor: {{$editor->name}}</li>
                @endif
            </ul>
            <div class="d-flex flex-direction-column align-items-center">
                <a href="/secretaria/formulario/download/{{$formulario->id}}" class="full-link upload btn botao-acessar"><i class="fa-solid fa-download"></i> Baixar formulário</a>
                <button id="statusBtn" class="full-link upload btn botao-acessar"><i class="fa-solid fa-arrows-spin"></i> Atualizar status</button>
                <button id="emailBtn" class="full-link upload btn botao-acessar"><i class="fa-solid fa-envelope"></i> Erro no envio</button>
            </div>

            <hr id="horizontal-line"/>
            <div id="hidden-content">
                
            </div>            
            
             
        
        {{-- <div class="">
            <h2 class="email-container"><strong>Erro nos arquivos</strong></h2>
            <p>Caso haja algum erro na solicitação do discente{{_(' (documento em falta, assinatura etc)')}}, clique <button id="emailBtn">aqui</button> para enviar-lhe um email</p>
            <div id="divEmail"></div>
        </div> --}}
    </div>
        
    </main>
    
    <script>

        function clear(div) {
            while(div.firstChild) {
                div.removeChild(div.firstChild);
            }
        }

        const emailBtn = document.getElementById('emailBtn');
        const container = document.getElementById('hidden-content');
        const statusBtn = document.getElementById('statusBtn')
        
        statusBtn.addEventListener('click', function showStatusForm() {
            clear(container);
            container.insertAdjacentHTML('afterbegin', `
                <div class="hidden-form">   
                    <form method="post" action="/secretaria/formulario/{{$formulario->id}}/status">
                        @csrf
                        @method('PUT')
                        
                        <fieldset>
                            <legend style="text-align: center">Escolha o atual estado do formulário</legend>
                            <div>
                                <input class="form-check-input" type="radio" name="status" value="Enviado"
                                @if ($formulario->status === 'Enviado')
                                    checked
                                @endif>
                                <label class="form-check-label">Enviado</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" id="louie" name="status" value="Deferido"
                                @if ($formulario->status === 'Deferido')
                                    checked
                                @endif>
                                <label class="form-check-label">Deferido</label>
                            </div>
                            
                            <div>
                                <input class="form-check-input" type="radio" id="louie" name="status" value="Indeferido"
                                @if ($formulario->status === 'Indeferido')
                                    checked
                                @endif>
                                <label class="form-check-label">Indeferido</label>
                            </div>
                        </fieldset>

                        @error('status')
                            {{$message}}
                        @enderror
                        <input type="hidden" name="editado_por" value="{{$secretario->id}}">
                        @error('editado_por')
                            {{$message}}
                        @enderror
                        <div class="d-flex flex-row-reverse">
                            <button class="btn botao-acessar" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i> Mudar status</button>
                        </div>
                    </form>
                </div>
            `);
            // statusBtn.removeEventListener('click', showStatusForm);
        })

        emailBtn.addEventListener('click', function showEmailForm() {
            clear(container);

            container.insertAdjacentHTML('afterbegin',`
                <div class="hidden-form">
                    <form action="/secretaria/{{$secretario->id}}/formulario/{{$formulario->id}}/invalido" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="texto">Descreva abaixo o(s) erro(s) encontrado(s) no envio do discente [o envio deletará este formulário do sistema]: </label>
                        <textarea class="form-control" name="texto" rows="3"></textarea>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button class="btn botao-acessar" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i> Enviar</button>
                    </div>
                    </form>
                </div>`
            );

            // emailBtn.removeEventListener('click', showEmailForm);
        });
    </script>
</body>
</html>