@extends('template')
@section('conteudo')

	<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">
			<h2>Cadastro de Itens</h2>
		</span>
	</div>	

	<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-3 col-sm-6 col-6">
				Cliente:
				<span class="badge badge-primary badge-pill">{{ $venda->usuario->nome}}</span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Venda :
				<span class="badge badge-primary badge-pill">{{ $venda->id }}</span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Items:
				<span class="badge badge-primary badge-pill">{{count($venda->produtos)}}</span>	
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Valor Total:
				<span class="badge badge-primary badge-pill">R$ {{$venda->valor}}</span>	
			</div>				
	</div>

	<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">.</span>
	</div>

	<form method="post" action="{{route('vendas_item_add',['id' => $venda->id])}}">
	@csrf

	<div class= "row bg-dark">
		<div class = "col-6 col-md-6">
		
			<div class="row m-2 p-2">
				<select class="custom-select" name="id_produto">
				@foreach ($produto as $p)
				<option value="{{ $p->id}}">{{$p->nome." ".$p->preco." ".$p->unidades->nome}}</option>
				@endforeach
				</select>
			</div>
			

			<div class="row mt-2 p-2">		
			
				<div class="col-4 col-md-4">
					<a style="min-width:50px" class= "btn btn-outline-danger btn-block" href="#" onclick="rta()">
						<i class="icon-minus-circled"></i>
					</a>
				</div>
				<div class="input-group col-4 col-md-4">		
					<input id="input_vendas" style="width:100%" type="text" name="quantidade" value="1" min="1">
				</div>
				<div class="col-4 col-md-4">
					<a style="min-width:50px" class= "btn btn-outline-success btn-block" href="#" onclick="add()">
						<i class="icon-plus-circled"></i>
					</a>		
				</div>
					
			</div>
		</div>

		<div class = "col-6 col-md-6">
			<div class= "row text-center text-white">
			<input type="submit" class="btn btn-success btn-lg btn-block m-2 p-2" value="Adicionar Produto">
			<a class="btn btn-info btn-lg btn-block m-2 p-2" data-toggle="modal" data-target="#finalizar">Finalizar Venda</a>
			</div>
		</div>
	</div>

	<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">.</span>
	</div>

	</form>

	<div class="row">
			<table class="table table-bordered table-hover mt-1">
				<thead class="thead-dark">
					<tr>
						<th id="celula1">ID</th>
						<th id="celula2">Nome</th>
						<th id="celula2">Quantidade</th>
						<th id="celula2">Valor Und</th>
						<th id="celula2">Subtotal</th>
						<th>Açoes</th>
					</tr>
				</thead>
				<tbody>
					@foreach($venda->produtos as $p)
					
					<tr>
						<td id="celula1">{{$p->pivot->id}}</td>
						<td id="celula2">{{$p->nome}}</td>
						<td id="celula2">{{$p->pivot->quantidade}}</td>
						<td id="celula2">R$ {{$p->preco}}</td>
						<td id="celula2">R$ {{$p->pivot->subtotal}}</td>
						<td>
							<a class="btn btn-danger" href="#" onclick="exclui({{$p->pivot->id}})">
							<i class="icon-trash-empty"></i>
							</a>
						</td>
					</tr>
					@endforeach				
				</tbody>
			</table>		
	</div>

<script>
	function rta(){
		if(document.querySelector("[name='quantidade']").value>1){
			document.querySelector("[name='quantidade']").value =	
			parseInt(document.querySelector("[name='quantidade']").value)-1;
		}
	}
</script>
<script>
	function add(){	
		if(document.querySelector("[name='quantidade']").value>=0){
			document.querySelector("[name='quantidade']").value =	
			parseInt(document.querySelector("[name='quantidade']").value) +1;
		}
	}

</script>
<script>
	function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>

<!-- Modal -->
<div class="modal fade" id="finalizar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
        Deseja Encerrar a Venda?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nao</button>
		<a class="btn btn-info" href="/venda/validar/{{ $venda->id }}" >Sim</a>
      </div>
    </div>
  </div>
</div>
@endsection