<div id="wrapper">
	@include('layouts.navbars.navs.auth')
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			@include('layouts.navbars.sidebar')
			@yield('content')
		</div>
		@include('layouts.footers.auth')
	</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    	<div class="modal-header">
	      		<h5 class="modal-title" id="exampleModalLabel">¿Listo para Salir?</h5>
	      		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	      			<span aria-hidden="true">×</span>
	      		</button>
	    	</div>
	    	<div class="modal-body">Selecione "Salir" si esta listo para culminar la sesión actual.</div>
		    <div class="modal-footer">
		     	<button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
		     	<a href="{{ route('logout') }}" class="btn btn-outline-primary" title="Salir" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">SALIR
		      	</a>
		    	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		        	@csrf
		    	</form>
		    </div>
	  	</div>
	</div>
</div>

