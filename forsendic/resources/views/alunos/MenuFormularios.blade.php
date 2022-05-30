<html lang="pt-br">
	<head>
		<title>Estilo CSS externo</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="{{asset('css/alunos/estilo2.css')}}">

	</head>

	<body>

		<div id="cabecalho">
			<img id="forsend" src="{{asset('/images/Logo_ForsendIC.png')}}">	

			<img id="ufal" src="{{asset('/images/ufal.png')}}">
		</div>

		<div id="caixa">
			<h1 id="titulo">FORMULÁRIOS</h1>

			<p id="subtitulo">Selecione abaixo o formulário que deseja enviar para secretaria:</p>

			<a class="forms" href="/alunos/desistencia">Desistência de Vínculo Total de Curso</a>
			<a class="forms" href="/alunos/trancamento">Trancamento de Matrícula de Disciplina</a>
			<a class="forms" href="/alunos/rematricula">Rematrícula</a>

			<a id="sair" href="/">⍈ Sair</a> 
		</div> 

	</body>

</html>