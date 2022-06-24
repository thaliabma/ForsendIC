<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body {
            background-image: url("{{asset('/images/FundoFolha.png')}}");
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
        <h2 style="color:black">Prezado discente,</h2>
        <p style="color:grey31">Este é seu código de uso único: </p>
        <h3 style="color:Navy" background-color="color:grey31" >{{$otp}}</h3>
        <p style="color:grey31">Lembre-se que o código só permite 20 minutos de acesso.</p>
        <p style="color:grey31">Atenciosamente, <br>Equipe do ForsendIC</p> 
    </div>
</body>
</html>