@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Produtos</h1>
	</span>
</div>

<div class="table-overflow">

	<table class="table table-bordered table-hover mt-1">
		<thead class="thead-dark">
			<tr>
				<th id="celula1">ID</th>
				<th id="celula2">Categoria</th>
				<th id="celula3">Nome</th>
				<th id="celula4">Preço</th>
				<th id="celula5">Und</th>
				<th>Operações</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($pdr as $p)
		  <tr class="table-light">
			<td id="celula1">{{ $p->id }}</td>
			<td id="celula2">{{ $p->categorias->nome }}</td>
			<td id="celula3">{{ $p->nome }}</td>
			<td id="celula4">R$ {{ $p->preco }}</td>
			<td id="celula5">{{ $p->unidades->nome }}</td>

			<td>

			 <a class="btn btn-warning mt-1" href="{{ route('produto_update', [ 'id' => $p->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger mt-1" href="#" onclick="exclui({{ $p->id }})">
			 Excluir
			 <i class="icon-trash-empty"></i>
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
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('produto_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Novo			
		</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o produto de id: " + id + "?")){
			location.href = "/produto/excluir/" + id;
		}
	}
</script>

@endsection
