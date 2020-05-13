@extends('template')
@section('conteudo')

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

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th id="celula1">ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Und</th>
                    <th>Subtotal</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venda->produtos as $v)
                <tr>
                    <td id="celula1">{{$v->pivot->id}}</td>
                    <td>{{$v->nome}}</td>
                    <td>{{$v->pivot->quantidade}}</td>
                    <td>R$ {{$v->preco}}</td>
                    <td>R$ {{$v->pivot->subtotal}}</td>
                    <td>
                        <a class="delete btn btn-danger m-1" data-nome="{{ $v->nome}}" data-id="{{ $v->pivot->id}}">
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
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('vendas_total') }}">
			<i class="icon-left-circled"></i>
			Voltar		
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
		$('a.delete-yes').attr('href', '/lista/{{ $venda->id }}/itens/remover/' + id); 
		$('#excluir').modal('show');
	});
</script>
@endsection