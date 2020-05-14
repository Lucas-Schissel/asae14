@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>
			Cadastro de Produtos
			<i class="icon-download"></i>
		</h2>
	</span>
</div>

<div class="container">
	<div class="row text-center p-2">

		<div class="col-lg-2 col-md-0 col-sm-0 col-0 ">
			<!-- coluna vazia esquerda -->
		</div>

		<div  class="col-lg-8 col-md-12 col-sm-12 col-12 mt-2 p-5 border border-success rounded">
		<form method="post" action="{{ route('produto_add') }}">
		@csrf
	
		<input type="text" class="form-control border border-success rounded" name="nome" placeholder="Digite um nome..." required>

		<div class="mt-3"></div>
		
		<input type="text" class="form-control border border-success rounded" step="0.01"  name="preco" placeholder="Digite o preço..." required>

		<div class="mt-3"></div>

		<select name="id_categoria" class="form-control border border-success rounded" required>
			<option value="" disabled selected>Escolha uma categoria:</option>
			@foreach ($ctg as $c)
			<option value="{{ $c->id}}">{{$c->nome}}</option>
			@endforeach
		</select>

		<div class="mt-3"></div>
	
		<select name="id_unidade" class="form-control border border-success rounded" required>
			<option value="" disabled selected>Escolha uma unidade:</option>
			@foreach ($und as $u)
			<option value="{{ $u->id}}">{{$u->nome}}</option>
			@endforeach
		</select>

		<div class="mt-3"></div>

		<button class="btn btn-success btn-block"  type="submit">
			Cadastrar
			<i class="icon-plus-circled"></i>
		</button>	
		
		</form>
		</div>

		<div class="col-lg-2 col-md-0 col-sm-0 col-0">
				<!-- coluna vazia direita -->
		</div>

	</div>
</div>

<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>

@endsection
