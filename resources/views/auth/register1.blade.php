@extends('layouts.app_inicio', ['titulo' => 'Login'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="{{ asset('img') }}/logo.png" alt="Logo Full Balanzas" width="200">
                                        <h1 class="h4 text-gray-900 mb-4">Create una Cuenta!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre y Apellido">
                                                @error('name')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese dirección de correo">
                                            @error('email')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="Nueva Clave" placeholder="Nueva Clave">
                                                @error('password')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                          <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="Repetir clave" placeholder="Repetir clave">
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Crear Cuenta') }}</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}" title="Recuperar Contraseña">{{ __('¿Olvidaste tu contraseña?') }}</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? Iniciar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
