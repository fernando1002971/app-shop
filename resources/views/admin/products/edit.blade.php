@extends('layouts.app')

<!-- Definimos un titulo para esta sección -->
@section('title','Bienvenidos a App Shop')

<!-- body-class retorna signup-page que es una cadena simple para aplicar el estilo -->
@section('body-class','product-page')


@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
	<div class="container">
		<div class="section text-center section-landing">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="title">Let's talk product</h2>
					<h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
				</div>
			</div>

			<div class="features">
				<div class="row">
					<div class="col-md-4">
						<div class="info">
							<div class="icon icon-primary">
								<i class="material-icons">chat</i>
							</div>
							<h4 class="info-title">First Feature</h4>
							<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info">
							<div class="icon icon-success">
								<i class="material-icons">verified_user</i>
							</div>
							<h4 class="info-title">Second Feature</h4>
							<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info">
							<div class="icon icon-danger">
								<i class="material-icons">fingerprint</i>
							</div>
							<h4 class="info-title">Third Feature</h4>
							<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<!-- Aqui vamos a colocar el nombre del producto a editar -->
			<h2 class="title text-center">Actualizar producto</h2>
	<!-- Directiva de blade en caso de existir algún error 
		mostramos una alerta y recorremos el arreglo de errors  -->
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)

					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
				@csrf

				<div class="row">

					<div class="col-sm-6">
<!-- Como inyectamos desde el controlador la consulta del id seleccionado aqui solo los mostramos con el atributo value -->
						<div class="form-group label-floating">
							<label class="control-label">Nombre del producto</label>
							<!-- Para no eliminar los valores en caso de un error de validación usamos la función old para que
						en caso de haber un error no desaparezcan los valores  -->
							<input type="text" class="form-control" name="name" value="{{ old('name',$product->name) }}">
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group label-floating">
							<label class="control-label">Precio del producto</label>
							<input type="number" step="0.01" class="form-control" name="price" value="{{ old('price',$product->price) }}">
						</div>

					</div>
				</div>

					<div class="form-group label-floating">
						<label class="control-label">Descripción corta</label>
						<input type="text" class="form-control" name="description" value="{{ old('description',$product->description) }}">
					</div>

					<textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">
					{{ old('long_description',$product->long_description) }}
					</textarea>

					<button class="btn btn-primary">Guardar producto</button>

			<a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar edición</a>



			</form>


		</div>


		<div class="section landing-section">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center title">Work with us</h2>
					<h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
					<form class="contact-form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Your Name</label>
									<input type="email" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Your Email</label>
									<input type="email" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group label-floating">
							<label class="control-label">Your Messge</label>
							<textarea class="form-control" rows="4"></textarea>
						</div>

						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<button class="btn btn-primary btn-raised">
									Send Message
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>

<footer class="footer">
	<div class="container">
		<nav class="pull-left">
			<ul>
				<li>
					<a href="http://www.creative-tim.com">
						Creative Tim
					</a>
				</li>
				<li>
					<a href="http://presentation.creative-tim.com">
						About Us
					</a>
				</li>
				<li>
					<a href="http://blog.creative-tim.com">
						Blog
					</a>
				</li>
				<li>
					<a href="http://www.creative-tim.com/license">
						Licenses
					</a>
				</li>
			</ul>
		</nav>
		<div class="copyright pull-right">
			&copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
		</div>
	</div>
</footer>
@endsection