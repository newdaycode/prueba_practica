@extends('layouts.app_admin', ['activePage' => 'inicio','titulo' => 'Inicio'])
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bienvenido {{ Auth::user()->names }} {{ Auth::user()->last_names }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    	<p>
                    		<b>Teléfono: </b>{{ $usuario->telefono }} <br>
                    		<b>Email: </b>{{ $usuario->email }} <br>
                    		<b>Documento de Identificación: </b>{{ $usuario->identificacion }} <br>
                    		<b>Fecha de Nacimiento: </b>{{ $usuario->fecha }} <br>
                    		<b>Pais: </b>{{ $usuario->pais }} <br>
                    		<b>Estado: </b>{{ $usuario->estado }} <br>
                    		<b>Ciudad: </b>{{ $usuario->ciudad }} <br>
                    	</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
