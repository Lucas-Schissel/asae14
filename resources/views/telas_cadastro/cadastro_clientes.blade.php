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

			<form method="post" action="{{ route('cliente_add') }}">
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