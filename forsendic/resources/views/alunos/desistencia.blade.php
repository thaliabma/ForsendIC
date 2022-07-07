<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <title>Desistência de Vínculo Total de Curso</title>
		<link rel="stylesheet" type="text/css" href="{{asset('/css/alunos/style_Forms.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

	</head>

    <body>
		<div id="cabecalho">
			<img id="forsend" src="{{asset('/images/Logo_ForsendIC.png')}} " >
            <div class="grow"></div>
			<img id="ufal" src="{{asset('/images/ufal.png')}}">
		</div>
        <form method="post" enctype="multipart/form-data" action="{{route('aluno.postar')}}">
            <div id="container">
                <div id="caixa">
                    <h6 id="titulo">Desistência de Vínculo Total de Curso</h6>

                    <p id="subtitulo">Preencha todos os campos do formulário</p>
                    <div class="form">
                        @csrf
                        <label class="labelCampos">Nome:</label><br>
                        <input class="campoF" type="text" name="aluno_nome" placeholder="Nome Completo" value="{{old('aluno_nome')}}"><br>

                        @error('aluno_nome')
                            {{$message}}
                        @enderror

                        <label class="labelCampos">Matrícula:</label><br>
                        <input class="campoF" type="number" name="aluno_matricula" placeholder="Número da Matrícula" value="{{old('aluno_matricula')}}"><br>

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
                        <p style="margin-top: 2%;">Você vai precisar de: </p>
                        <ul >
                            <li>Formulário disponível no site da UFAL</li>
                            <li>Cópia do RG</li>
                            <li>Declaração de Quitação</li>
                        </ul>
                        <label class="labelCampos">Anexar (somente em pdf) :</label><br>

                        {{-- <label class="labelFile" for="arquivo1" id="arq1"> ⇩ Cópia do RG ou CNH</label> --}}

						<!-- ÁREA DO "CLIQUE OU ARRASTE AQUI -->
							<div class="area-upload">
								<label for="arquivo1" class="label-upload">
									<i class="fas fa-cloud-upload-alt"></i>
							<div class="texto">Clique ou arraste o arquivo</div>
							</label>
								<input type="file" name="file" id="arquivo1" multiple/>
						
								<div class="lista-uploads">
								</div>
							</div>
						<!-- FIM DA ÁREA DO "CLIQUE OU ARRASTE AQUI -->
                        @error('file')
                            {{$message}}
                        @enderror
                        {{-- <label class="labelFile" for="arquivo2" id="arq2"> ⇩ Desistência de Vínculo</label>
                        <input type="file" name="arquivo2" id="arquivo2"><br>

                        <label class="labelFile" for="arquivo3" id="arq3"> ⇩ Declaração de Quitação</label>
                        <input type="file" name="arquivo3" id="arquivo3"><br> --}}
                    </div>
                </div>
				<script>
						let drop_ = document.querySelector('.area-upload #arquivo1');
						drop_.addEventListener('dragenter', function(){
							document.querySelector('.area-upload .label-upload').classList.add('highlight');
						});
						drop_.addEventListener('dragleave', function(){
							document.querySelector('.area-upload .label-upload').classList.remove('highlight');
						});
						drop_.addEventListener('drop', function(){
							document.querySelector('.area-upload .label-upload').classList.remove('highlight');
						});

						document.querySelector('#arquivo1').addEventListener('change', function() {
						var files = this.files;
						for(var i = 0; i < files.length; i++){
							var info = validarArquivo(files[i]);
							
							//Criar barra
							var barra = document.createElement("div");
							var fill = document.createElement("div");
							var text = document.createElement("div");
							barra.appendChild(fill);
							barra.appendChild(text);
							
							barra.classList.add("barra");
							fill.classList.add("fill");
							text.classList.add("text");
							
							if(info.error == undefined){
								text.innerHTML = info.success;
								enviarArquivo(i, barra); //Enviar
							}else{
								text.innerHTML = info.error;
								barra.classList.add("error");
							}
							
							//Adicionar barra
							document.querySelector('.lista-uploads').appendChild(barra);
						};
					});

					function validarArquivo(file){
					console.log(file);
					// Tipos permitidos
					var mime_types = [ 'application/pdf'];
					
					// Validar os tipos
					if(mime_types.indexOf(file.type) == -1) {
						return {"error" : "O arquivo " + file.name + " não permitido"};
					}

					// Apenas 700MB é permitido
					if(file.size > 700*1024*1024) {
						return {"error" : file.name + " ultrapassou limite de 700MB"};
					}

					// Se der tudo certo
					return {"success": "Enviando: " + file.name};
				}

					function enviarArquivo(indice, barra){
					var data = new FormData();
					var request = new XMLHttpRequest();
					
					//Adicionar arquivo
					data.append('file', document.querySelector('#arquivo1').files[indice]);
					
					// AJAX request finished
					request.addEventListener('load', function(e) {
						// Resposta
						if(request.response.status == "success"){
							barra.querySelector(".text").innerHTML = "<a href=\"" + request.response.path + "\" target=\"_blank\">" + request.response.name + "</a> <i class=\"fas fa-check\"></i>";
							barra.classList.add("complete");
						}else{
							barra.querySelector(".text").innerHTML = "Erro ao enviar: " + request.response.name;
							barra.classList.add("error");
						}
					});
					
					// Calcular e mostrar o progresso
					request.upload.addEventListener('progress', function(e) {
						var percent_complete = (e.loaded / e.total)*100;
						
						barra.querySelector(".fill").style.minWidth = percent_complete + "%"; 
					});

					//Resposta em JSON
					request.responseType = 'json';
					
					// Caminho
					request.open('post', 'upload.php'); 
					request.send(data);
				}


					</script>
                <div class="botoes">
                    <a  class="butao1 btn d-inline" style="background: #355592; color: #fff;" href="{{route('aluno.forms')}}" role="button">Voltar</a>
                    <input class="butao2 btn d-inline" style="background: #355592; color: #fff;" id="enviar" type="submit" value="Enviar">
                </div>
            </div>
        </form>
	</body>
	<!-- <body>
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
				<input type="hidden" name="demanda" value="desistencia">

				@error('demanda')
					{{$message}}
				@enderror
				{{-- <label class="labelCampos">Email:</label><br>
				<input class="campoF" type="email" name="email" placeholder="Email Institucional"><br><br> --}}
				<p>Você vai precisar de: </p>
				<ul>
					<li>Formulário disponível no site da UFAL</li>
					<li>Cópia do RG</li>
					<li>Declaração de Quitação</li>
				</ul>
				<label class="labelCampos">Anexar (somente em pdf) :</label><br>

				{{-- <label class="labelFile" for="arquivo1" id="arq1"> ⇩ Cópia do RG ou CNH</label> --}}
				<input type="file" name="file" id="arquivo1"><br>
				@error('file')
					{{$message}}
				@enderror
				{{-- <label class="labelFile" for="arquivo2" id="arq2"> ⇩ Desistência de Vínculo</label>
				<input type="file" name="arquivo2" id="arquivo2"><br>

				<label class="labelFile" for="arquivo3" id="arq3"> ⇩ Declaração de Quitação</label>
				<input type="file" name="arquivo3" id="arquivo3"><br> --}}

				<input id="enviar" type="submit" value="Enviar">

			</form>

			<div>
				Volte sempre, ForsendIC agradece!
			</div>

		</div>

	</body> -->
</html>
