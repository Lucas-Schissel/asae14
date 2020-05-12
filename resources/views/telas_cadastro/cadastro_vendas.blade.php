@extends('template')
@section('conteudo')
@stack('msg')

@if ($errors->any())
<div class="modal fade" id="recado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body alert-danger rounded">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					<br>
					@endforeach
				</ul>
			</div>						
		</div>
	</div>
</div>

<script type="text/javascript">
$('#recado').modal('show')
</script>
@endif

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Cadastro de Venda</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('venda_add') }}">
		@csrf

		<h4>Selecione um cliente:</h4>
		<select name="id_usuario" class="form-control">
        @foreach ($cli as $c)
        <option value="{{ $c->id}}">{{$c->nome}}</option>
        @endforeach
		</select>
		<br>
		<input type="submit" class="btn btn-success" value="Cadastrar">
	</form>
</div>

<div class="mt-2 p-2">
</div>

@endsection