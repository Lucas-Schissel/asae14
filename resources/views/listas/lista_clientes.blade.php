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

			 <a class="btn btn-warning mt-1" href="{{ route('usuario_update', [ 'id' => $c->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger m-1" href="" data-toggle="modal" data-target="#excluir">
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
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('usuario_cadastro') }}">
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
        Deseja excluir o usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#finalizar">Nao</button>
		<a class="btn btn-info" href="/usuario/excluir/{{ $c->id }}" >Sim</a>
      </div>
    </div>
  </div>
</div>

@else
    <div class="alert alert-danger m-2">
        <h3> Nao Existe Clientes Cadastrados </h3>
    </div>
@endif

@endsection
