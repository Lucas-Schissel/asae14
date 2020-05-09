@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao do Produto</h1>
	</span>
</div>

<div class="text-center p-5">
	<form method="post" action="{{ route('produto_alterar', ['id' => $pdr->id]) }}">
		@csrf
		<br>
		<input type="text" class="form-control" name="nome"  value="{{ $pdr->nome }}" required>
		<br>
		<input type="number" class="form-control" step="0.01"  name="preco" value="{{ $pdr->preco }}" required>
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection