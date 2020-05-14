@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>
			Cadastro de Venda
			<i class="icon-cart-plus"></i>
		</h2>
	</span>
</div>

<div class="container">
    <div class="row text-center p-5">

        <div class="col-lg-2 col-md-0 col-sm-0 col-0">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-lg-8 col-md-12 col-sm-12 col-12 mt-4 p-5 border border-success rounded">

			<form method="post" action="{{ route('venda_add') }}">
			{{ method_field('POST') }}
			@csrf

			
				<select name="id_usuario" class="form-control border border-success rounded">
				<option value="" disabled selected>Escolha uma cliente:</option>
				@foreach ($cli as $c)
				<option value="{{ $c->id}}">{{$c->nome}}</option>
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