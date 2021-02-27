@extends('layouts.app_admin', ['activePage' => 'usuario','titulo' => 'Usuario'])
@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/formvalidation/formValidation.min.css" media="none" onload="if(media!='all')media='all'">
@stop
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
                <div class="text-right">
                    <button id="agregar" class="btn btn-rounded btn-outline-primary" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Nuevo Registro
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline">
                            <input class="form-control" type="text" placeholder="Buscar" aria-label="Buscar" id="buscador" onkeyup="myFunction(this)">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="table-responsive tabla-usuario">
                	<!-- lista de usuario-->
                    @include('usuario.listado')
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de agregar usuario-->
    @include('usuario.agregar')
    <!-- Modal editar usuario-->
    @include('usuario.editar')
    <!-- Modal eliminar usuario-->
    @include('usuario.eliminar')
@endsection
@section('js')
    <script src="{{ asset('assets') }}/formvalidation/formValidation.js" defer=""></script>
    <script src="{{ asset('assets') }}/formvalidation/framework/bootstrap4.min.js" defer=""></script>
    <script src="{{ asset('operaciones') }}/usuario.js" defer=""></script>
@stop
