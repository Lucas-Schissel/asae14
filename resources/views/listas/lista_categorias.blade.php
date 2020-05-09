@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Categorias</h1>
	</span>
</div>

<div class="table-overflow">

	<table class="table table-bordered table-hover mt-1">
		<thead class="thead-dark">
			<tr>
				<th id="celula1">ID</th>
				<th>Nome</th>
				<th>Descriçao</th>
				<th>Operações</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($ctg as $c)
		  <tr class="table-light">
			<td id="celula1">{{ $c->id }}</td>
			<td>{{ $c->nome }}</td>
			<td>{{ $c->descricao }}</td>

			<td>

			 <a class="btn btn-warning mt-1" href="{{ route('categoria_update', [ 'id' => $c->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger mt-1" href="#" onclick="exclui({{ $c->id }})">
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
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('categoria_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Nova			
		</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir a categoria de id: " + id + "?")){
			location.href = "/categoria/excluir/" + id;
		}
	}
</script>

@endsection
