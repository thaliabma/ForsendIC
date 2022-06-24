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
				<h1 id="titulo">Rematrícula</h1>
				<label id="subtitulo">Preencha todos os campos do formulário</label>
			</div>

			<form method="post" action="{{route('aluno.postar')}}" enctype="multipart/form-data">
				@csrf
				
				<label class="labelCampos">Nome:</label><br>
				<input class="campoF" type="text" name="aluno_nome" placeholder="Nome Completo" value="{{old('aluno_nome')}}"><br>
				
				@error('aluno_nome')
					{{$message}}
				@enderror
				
				<label class="labelCampos">Matricula:</label><br>
				<input class="campoF" type="number" name="aluno_matricula" placeholder="Número da Matrícula" value="{{old('aluno_matricula')}}"><br>
				
				@error('aluno_matricula')
					{{$message}}
				@enderror
				<input type="hidden" name="aluno_email" value="{{Auth::user()->email}}">
				
				@error('aluno_email')
					{{$message}}
				@enderror
				<input type="hidden" name="demanda" value="rematricula">
				
				@error('demanda')
					{{$message}}
				@enderror

				<p>Você vai precisar de: </p>
				<ul>
					<li>Rematrícula Acadêmica, disponível no site da UFAL</li>
					<li>Cópia do RG ou da CNH</li>
					<li>Histórico Acadêmico</li>
				</ul>

				<label class="labelCampos">Anexar (somente em pdf):</label><br>
				<input type="file" name="file" id="arquivo3"><br>
				@error('file')
					{{$message}}
				@enderror

				<input id="enviar" type="submit" value="Enviar">

			</form> 

			<div>
				Volte sempre, ForsendIC agradece!
			</div>

		</div>
		
	</body>
</html>