@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Cadastro de Categorias</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('categoria_add') }}">
		@csrf
		<h4>Digite um nome:</h4>
			<input type="text" class="form-control" name="nome" placeholder="Nome">
		<br>
		    <input type="text" class="form-control" name="descricao" placeholder="Descricao">
		<br>
			<input type="submit"  class="btn btn-success btn-lg btn-block" value="Confirmar">
		
	</form>
</div>

@endsection