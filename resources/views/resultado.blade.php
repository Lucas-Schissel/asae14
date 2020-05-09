@extends('template')
@section('conteudo')

<BR>
<BR>
<div class="text text-center" >
<h1>
<i class="icon-hand-peace-o"></i>
{{ $mensagem }}
<i class="icon-smile"></i>
</h1>
<div>
<BR>
<BR>
<h2>{{ $value = session()->get('nome')}}</h2>
<BR>
<BR>
<BR>
<BR>
<div class="text text-center" >
    <h2> ASAE - 12 </h2>
<div>
@push('marmita')

<!-- Modal -->
<div class="modal fade" id="dashboard" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
		<a class="btn btn-info" href="#" >Sim</a>
      </div>
    </div>
  </div>
</div>

@endpush
@endsection
