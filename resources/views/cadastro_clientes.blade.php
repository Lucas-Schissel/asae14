<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/t2.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/fontello.css')}}" type="text/css">

</head>
<body>

<div class="row d-flex justify-content-center">
		<h3>
			Cadastro de Clientes
			<i class="icon-download"></i>
		</h3>

</div>

<div class="container mt-5 text-center">
    <div class="row">

        <div class="col-md-2 mt-2">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-md-8 mt-3 p-5">

			<form method="post" action="{{ route('usuario_add') }}">
			@csrf							
					<input type="text"  name="nome" placeholder="Digite um Nome . . ." required>
					<br><br>
					<input type="text"  name="login" placeholder="Digite um Login . . ." required>
					<br><br>
					<input type="password"  name="senha" placeholder="Digite uma Senha . . ." required>
					<br><br>
					<button class="btn btn-success btn-lg" style="width:250px" type="submit">
					 Cadastrar
					<i class="icon-ok-circled2"></i>
					</button>	
					<br><br>				 
			<form>  

        </div>
			
		<div class="col-md-2 mt-2">
			<!-- coluna vazia direita -->
		</div>

	</div>
</div> 

<script type="text/javascript">
        document.tela_cadastro_cliente.reset();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>