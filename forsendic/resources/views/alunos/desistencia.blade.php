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
				<a id="x" href="/alunos">X</a>
				<h1 id="titulo">Desistência de Vínculo Total de Curso</h1>
				<label id="subtitulo">Preencha todos os campos do formulário</label>
			</div>

			<form>
					
				<label class="labelCampos">Nome:</label><br>
				<input class="campoF" type="text" name="nome" placeholder="Nome Completo"><br>

				<label class="labelCampos">Matricula:</label><br>
				<input class="campoF" type="number" name="matricula" placeholder="Número da Matrícula"><br>

				<label class="labelCampos">Email:</label><br>
				<input class="campoF" type="email" name="email" placeholder="Email Institucional"><br><br>

				<label class="labelCampos">Anexar (somente em pdf):</label><br>
				<label class="labelFile" for="arquivo1" id="arq1"> ⇩ Cópia do RG ou CNH</label>
				<input type="file" name="arquivo1" id="arquivo1"><br>
					
				<label class="labelFile" for="arquivo2" id="arq2"> ⇩ Desistência de Vínculo</label>
				<input type="file" name="arquivo2" id="arquivo2"><br>
				
				<label class="labelFile" for="arquivo3" id="arq3"> ⇩ Declaração de Quitação</label>
				<input type="file" name="arquivo3" id="arquivo3"><br>

				<input id="enviar" type="submit" name="Enviar">

			</form> 

			<div>
				Volte sempre, ForsendIC agradece!
			</div>

		</div>
		
	</body>
</html>