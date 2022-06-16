<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redefinir senha da secretaria</title>

    <style type="text/css">
        body {
            background-color: GhostWhite;
        }

        a:link, a:visited, a:active{
	        text-decoration: none;
        }

        #imagem {
	        position: absolute;
	        z-index: 2;
        }

        #forsend {
            width: 14%;
            height: 9%;
        }

        #ufal {
            width: 8%;
            height: 13%;
            float: right;
        }

        #tela {
            opacity: none;
	        display: flex;
	        text-align: center;
	        flex-direction: column;
	        flex-wrap: nowrap;
	        justify-content: space-around;
	        position: absolute;
	        z-index: 1;
            width: 96%;
            margin: 0 auto;
        }

    </style>

</head>
<body>

    <div id="imagem">
        <img id="forsend" src="{{asset('/images/Logo_ForsendIC.png')}}">	
        <img id="ufal" src="{{asset('/images/ufal.png')}}">
	</div>

    <div id="tela">
        <h2 style="color:black">Redefinir senha</h2>
        <p style="color:grey31">Caso deseje alterar a senha de acesso por parte da secretária: </p><br>
        <a href="{{$url}}" style="color:Navy"><b>CLIQUE AQUI</b></a><br>
        <p style="color:grey31">Esse link funcionará por {{$count}} minutos.</p>
        <p style="color:grey31">Atenciosamente, <br>Equipe do ForsendIC</p> 
    </div>
</body>
</html>