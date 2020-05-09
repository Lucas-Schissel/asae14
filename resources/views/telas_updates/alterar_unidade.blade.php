@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao da Unidade</h1>
	</span>
</div>

<div class="text-center p-5">
	<form method="post" action="{{ route('unidade_alterar', ['id' => $und->id]) }}">
		@csrf
		<br>
		<input type="text" class="form-control" name="nome"  value="{{ $und->nome }}" required>
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection