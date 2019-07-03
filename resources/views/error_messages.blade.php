@if ($errors->any())
		
				
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger">
							 {{ $error }}
									</div>
						@endforeach
				
 
	@endif

	@if (session('added'))
	<div class="alert alert-success alert-dismissable custom-success-box" >
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 <strong> {{ session('added') }} </strong>
	</div>
@endif