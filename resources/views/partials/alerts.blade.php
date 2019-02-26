@if (session('message'))
     <div class="row">
    	<div class="col-lg-5">
    		<div role="alert" class="alert alert-info">
            	{{ session('message') }}
     		</div>
    	</div>
  	</div>
@endif 

