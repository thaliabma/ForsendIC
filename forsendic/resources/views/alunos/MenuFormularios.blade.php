<html lang="pt-br">
	<head>
		<title>Menu de Formulários</title>
		<meta charset="utf-8">
        <meta
            name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="{{asset('css/alunos/style_Menu.css')}}">

	</head>

	<body>
		<div id="cabecalho">
			<img id="forsend" src="{{asset('/images/Logo_ForsendIC.png')}} " >
            <div id="grow"></div>
			<img id="ufal" src="{{asset('/images/ufal.png')}}">
		</div>

		<div id="caixa">
			<h1 id="titulo">FORMULÁRIOS</h1>

			<p id="subtitulo">Selecione abaixo o formulário que deseja enviar para secretaria:</p>

            <a class="forms btn btn-primary" href="{{route('aluno.desistencia')}}" role="button">Desistência de Vínculo Total de Curso</a>
            <a class="forms btn btn-primary" href="{{route('aluno.trancamento')}}" role="button">Trancamento de Matrícula de Disciplina</a>
            <a class="forms btn btn-primary" href="{{route('aluno.rematricula')}}" role="button">Rematrícula</a>
			<form method="post" action="{{route('aluno.logout')}}">
				@csrf
				<button id="sair" type="submit">Sair</a>
			</form>
		</div>

	</body>

</html>
