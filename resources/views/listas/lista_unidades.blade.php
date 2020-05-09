@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Unidades</h1>
	</span>
</div>

	
	<table class="table table-bordered table-hover mt-1">

		<thead class="thead-dark">
			<tr>
				<th id="celula1">ID</th>
				<th >Nome</th>
				<th >Operações</th>
			</tr>
		</thead>
					
		<tbody>
		@foreach ($und as $u)
		  <tr class="table-light" >
			<td id="celula1">{{  $u->id }}</td>
			<td>{{ 	$u->nome }}</td>
			<td>

			 <a class="btn btn-warning mt-1" href="{{ route('unidade_update', [ 'id' => $u->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger mt-1" href="#" onclick="exclui({{ $u->id }})">
			 Excluir
			 <i class="icon-trash-empty"></i>
			 </a>


			</td>
		  </tr>
		@endforeach
		</tbody>
	</table>



<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('menu') }}">
			<i class="icon-left-circled"></i>
			Voltar		
		</a>
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('unidade_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Novo			
		</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir a unidade de id: " + id + "?")){
			location.href = "/unidade/excluir/" + id;
		}
	}
</script>

@endsection
