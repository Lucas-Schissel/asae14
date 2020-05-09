@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao do Cliente</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('usuario_alterar', ['id' => $cli->id]) }}">
		@csrf
		<input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $cli->nome }}">
		<br>
		<input type="text" class="form-control" name="login" placeholder="Login" value="{{ $cli->login }}">
		<br>
		<input type="password" class="form-control" name="senha" placeholder="Senha" value="{{ $cli->senha }}">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection