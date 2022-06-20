<html lang="pt-br">
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="{{asset('/css/alunos/estiloForms.css')}}">

	</head>

	<body>
		<div id="cabecalho">

			<img id="forsend" src="{{asset('/images/Logo_ForsendIC.png')}}">	

			<img id="ufal" src="{{asset('/images/ufal.png')}}">

		</div> 

		<div id="caixa2">
			<div>
				<a id="x" href="{{route('aluno.forms')}}">X</a>
				<h1 id="titulo">Desistência de Vínculo Total de Curso</h1>
				<label id="subtitulo">Preencha todos os campos do formulário</label>
			</div>

			<form method="post" enctype="multipart/form-data" action="{{route('aluno.postar')}}">
				@csrf
				<label class="labelCampos">Nome:</label><br>
				<input class="campoF" type="text" name="aluno_nome" placeholder="Nome Completo"><br>
				@error('aluno_nome')
					{{$message}}
				@enderror
				<label class="labelCampos">Matricula:</label><br>
				<input class="campoF" type="number" name="aluno_matricula" placeholder="Número da Matrícula"><br>
				@error('aluno_matricula')
					{{$message}}
				@enderror
				<input type="hidden" name="aluno_email" value="{{Auth::user()->email}}">
				@error('aluno_email')
					{{$message}}
				@enderror
				<input type="hidden" name="demanda" value="desistencia">
				@error('demanda')
					{{$message}}
				@enderror
				{{-- <label class="labelCampos">Email:</label><br>
				<input class="campoF" type="email" name="email" placeholder="Email Institucional"><br><br> --}}

				<label class="labelCampos">Anexar (somente em pdf):</label><br>
				
				{{-- <label class="labelFile" for="arquivo1" id="arq1"> ⇩ Cópia do RG ou CNH</label> --}}
				<input type="file" name="file" id="arquivo1"><br>
				@error('file')
					{{$message}}
				@enderror
				{{-- <label class="labelFile" for="arquivo2" id="arq2"> ⇩ Desistência de Vínculo</label>
				<input type="file" name="arquivo2" id="arquivo2"><br>
				
				<label class="labelFile" for="arquivo3" id="arq3"> ⇩ Declaração de Quitação</label>
				<input type="file" name="arquivo3" id="arquivo3"><br> --}}

				<input id="enviar" type="submit" name="Enviar">

			</form> 

			<div>
				Volte sempre, ForsendIC agradece!
			</div>

		</div>
		
	</body>
</html>