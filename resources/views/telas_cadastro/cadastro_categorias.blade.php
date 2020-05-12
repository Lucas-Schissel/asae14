@extends('template')
@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <br>
            @endforeach
            </ul>
</div>
@endif

@if (session()->has('mensagem'))				
				
	<div class="modal fade" id="recado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body alert-info rounded">
					<div>{{ session('mensagem')}}</div>
				</div>						
			</div>
		</div>
	</div>

	<script type="text/javascript">
    	$('#recado').modal('show')
	</script>
	{{session()->forget(['mensagem'])}}

@endif

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