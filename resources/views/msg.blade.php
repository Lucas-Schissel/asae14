@prepend('msg')

@if (session()->has('mensagem'))				
				
	<div class="modal fade" id="recado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body alert-info rounded">
					<div>{{ session('mensagem')}}</div>
				</div>						
			</div>
		</div>
	</div>

	<script type="text/javascript">
    	$('#recado').modal('show')
	</script>
	{{session()->forget(['mensagem'])}}

@endif

@endprepend