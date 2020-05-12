@extends('template')
@section('conteudo')

@if (count($cli) >0)   

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Clientes</h1>
	</span>
</div>

<div class="table-overflow">

	<table id="tablesorter-imasters" class="table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th id="celula1">ID</th>
				<th id="celula2">Nome</th>
				<th id="celula3">Login</th>
				<th>Operações</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($cli as $c)
		  <tr class="table-light">
			<td id="celula1">{{ $c->id }}</td>
			<td id="celula2">{{ $c->nome }}</td>
			<td id="celula3">{{ $c->login }}</td>

			<td>

			 <a class="btn btn-warning mt-1" href="{{ route('cliente_update', [ 'id' => $c->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="delete btn btn-danger m-1" data-nome="{{ $c->nome}}" data-id="{{ $c->id}}">
			 Excluir
			 <i class="icon-trash-empty"></i>
			 </a>

			 <a class="btn btn-success mt-1" href="{{ route('vendas_cliente', [ 'id' => $c->id ])}}">
			 Vendas
			 <i class="icon-dollar"></i>
			 </a>

			</td>
		  </tr>
		@endforeach
		</tbody>
	</table>

</div>

<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('menu') }}">
			<i class="icon-left-circled"></i>
			Voltar		
		</a>
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('cliente_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Novo			
		</a>
	</div>
</div>

<div class="modal fade" id="excluir" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
		Deseja realmente excluir o cliente, <span class="nome"></span>?
        
      </div>
      <div class="modal-footer justify-content-center">
		<a href="#" type="button" class="btn btn-outline-secondary delete-yes">Sim</a>
		<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<script>
	$('.delete').on('click', function(){
		var nome = $(this).data('nome');
		var id = $(this).data('id'); 
		$('span.nome').text(nome); 
		$('a.delete-yes').attr('href', '/cliente/excluir/' +id); 
		$('#excluir').modal('show');
	});
</script>

@else
    <div class="alert alert-danger m-2">
        <h3> Nao Existe Clientes Cadastrados </h3>
    </div>
@endif

@endsection
