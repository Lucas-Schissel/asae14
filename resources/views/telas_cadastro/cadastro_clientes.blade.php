@extends('template')
@section('conteudo')

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

@endsection