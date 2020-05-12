@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Cadastro de Unidades</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('unidade_add') }}">
		@csrf
		<h4>Nome:</h4>
			<input type="text" class="form-control" name="nome" placeholder="Digite um nome">
		<br>
			<input type="submit"  class="btn btn-success btn-lg btn-block" value="Confirmar">
	</form>
</div>

@endsection