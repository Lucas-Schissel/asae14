@extends('template')
@section('conteudo')

<div class="row bg-dark text-white border border-white rounded ">
  <div>
    <br>
    <br>
  </div>
</div>

<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Clientes:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$clientes}}
        </span>		
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Vendas:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$vendas}}
        </span>		
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Produtos:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$produtos}}
        </span>	
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
        Total em Vendas: 
				<span id="estrela" class="badge badge-primary badge-pill">
          R$: {{$dinheiros}}
        </span>	
			</div>				
</div>

<div class="row bg-dark text-white border border-white rounded ">
  <div>
    <br>
    <br>
  </div>
</div>


@endsection