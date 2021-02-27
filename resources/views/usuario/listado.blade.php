<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>{{ __('Nombres') }}</th>
            <th>{{ __('Apellidos') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Identificación') }}</th>
            <th>{{ __('Fecha de nacimiento') }}</th>
            <th>{{ __('Edad') }}</th>
            <th>{{ __('Ubicación') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nombres}}</td>
                <td>{{$usuario->apellidos}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->identificacion}}</td>
                <td>{{$usuario->fecha}}</td>
                <td>{{\Carbon\Carbon::parse($usuario->fecha)->age}}</td>
                <td>{{$usuario->pais}}, {{$usuario->estado}}, {{$usuario->ciudad}}</td>
                 
                <td>
                    <div class="btn-group flex-wrap">
                        <div class="btn-group">
                            <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a onclick="event.preventDefault();editar({{$usuario->codigo}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                <a onclick="event.preventDefault();eliminar({{$usuario->codigo}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
                            </div>
                        </div>
                    </div>                    
                </td>
            </tr>                               
        @endforeach 
    </tbody>
</table>
