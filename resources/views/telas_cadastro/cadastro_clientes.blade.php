@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>
			Cadastro de Clientes
			<i class="icon-download"></i>
		</h2>
	</span>
</div>

<div class="container">
    <div class="row text-center p-5">

        <div class="col-md-2 col-sm-2 col-2 mt-4 p-5">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-md-8 col-sm-8 col-8 mt-4 p-5 border border-success rounded">

			<form method="post" action="{{ route('cliente_add') }}">
			@csrf					
					<input class="form-control mt-3 p-4 border border-success rounded" type="text"  name="nome" placeholder="Digite um nome . . ." required>
					
					<input class="form-control mt-3 p-4 border border-success rounded" type="text"  name="login" placeholder="Digite um login . . ." required>
					
					<input class="form-control mt-3 p-4 border border-success rounded" type="password"  name="senha" placeholder="Digite uma senha . . ." required>
					
					<button class="btn btn-success btn-block mt-3 p-3 "  type="submit">
					 Cadastrar
					<i class="icon-plus-circled"></i>
					</button>			 
			<form>  

        </div>
			
		<div class="col-md-2 col-sm-2 col-2 mt-4 p-5 ">
			<!-- coluna vazia direita -->
		</div>

	</div>
</div> 

<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>


@endsection