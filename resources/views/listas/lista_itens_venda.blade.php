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
                        <a class="btn btn-danger" href="#" onclick="exclui({{ $v->pivot->id }})">
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
    
<script>
	function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/lista/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>
@endsection