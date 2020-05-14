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
				<option value="" disabled selected>Escolha uma produto:</option>
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
			
		<div class="container bg-dark text-left text-white ml-1 mt-1 mr-3 p-1">
			<div class="row col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > ID</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > Nome</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > Qtd</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > Valor</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > Subtotal</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-2" > Açoes</div>
			</div>
		</div>
					
			<table class="table table-bordered table-hover ml-1">
				<tbody>
					@foreach($venda->produtos as $p)
					
					<tr>
						<td >{{$p->pivot->id}}</td>
						<td >{{$p->nome}}</td>
						<td >{{$p->pivot->quantidade}}</td>
						<td >R$ {{$p->preco}}</td>
						<td >R$ {{$p->pivot->subtotal}}</td>
						<td>
							<a class="delete btn btn-danger m-1" data-nome="{{ $p->nome}}" data-id="{{ $p->pivot->id}}">
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

<div class="modal fade" id="excluir" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
		Deseja realmente excluir o item, <span class="nome"></span>?
        
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
		$('a.delete-yes').attr('href', '/venda/{{ $venda->id }}/itens/remover/' + id); 
		$('#excluir').modal('show');
	});
</script>

<div class="modal fade bd-example-modal-md" id="finalizar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        Deseja Encerrar a Venda?
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Nao</button>
		<a type="button" class="btn btn-outline-secondary" href="/venda/validar/{{ $venda->id }}" >Sim</a>
      </div>
    </div>
  </div>
</div>

@endsection
