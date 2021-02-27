<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>{{ __('Asunto') }}</th>
            <th>{{ __('Destinatario') }}</th>
            <th>{{ __('Mensaje') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emails as $email)
            <tr>
                <td>{{$email->subject}}</td>
                <td>{{$email->recipient}}</td>
                <td>{{$email->message}}</td>
                 
                <td>
                    <div class="btn-group flex-wrap">
                        <div class="btn-group">
                            <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a onclick="event.preventDefault();editar({{$email->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    <a onclick="event.preventDefault();eliminar({{$email->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
                            </div>
                        </div>
                    </div>                    
                </td>
            </tr>                               
        @endforeach 
    </tbody>
</table>
{{ $emails->links() }}
