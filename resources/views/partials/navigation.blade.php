	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top affix">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand page-scroll" href="{{ url('/client') }}">Restaurant Sefardí</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					@if(!Sentinel::guest())
						<li>
							<a href="{{ url('/client/area') }}" class="page-scroll">Inicio</a>
						</li>
						<li>
                            <a class="page-scroll" href="{{ url('client/reservations/create') }}"  title="Reservar">Reservaciones</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ url('client/exit') }}/{{Sentinel::getUser()->id}}" title="Entrar">Salir</a>
                        </li>

                    @endif
					
				</ul>
			</div>
		<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<!-- End Navigation -->