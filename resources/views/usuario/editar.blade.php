<!-- Inicio Modal -->
<div id="ModalEditar" class="modal fade">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Registro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormEditar" autocomplete="off">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Nombres</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="editar_nombres" id="editar_nombres" placeholder="Nombres" required="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Apellidos</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="editar_apellidos" id="editar_apellidos" placeholder="Apellidos" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Email</label>
                                    <div class=" col-md-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Teléfono</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="editar_telefono" id="editar_telefono" placeholder="Teléfono" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Identificación</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="identification" id="identification" placeholder="Identificación" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Fecha de nacimiento</label>
                                    <div class=" col-md-12">
                                        <input type="date" class="form-control fecha" name="editar_fecha" id="editar_fecha" placeholder="Fecha de nacimiento" required="">
                                        <div class="msj"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Edad</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control edad" name="edad_editar" id="edad_editar" placeholder="Edad" required="" readonly="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">País</label>
                                    <div class=" col-md-12">
                                        <select class="form-control pais" title="Pais" name="editar_pais" id="editar_pais" required="required">
                                            @foreach($paises as $pais)
                                                <option value="{{$pais->id}}" >{{$pais->country_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Estado</label>
                                    <div class=" col-md-12">
                                        <select class="form-control estado" title="Estado" name="editar_estado" id="editar_estado" required="required">
                                        </select>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Ciudad</label>
                                    <div class=" col-md-12">
                                        <select class="form-control ciudad" title="Ciudad" name="editar_ciudad" id="editar_ciudad" required="required">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="codigo_editar" id="codigo_editar">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="editar" class="btn btn-rounded btn-warning">Actualizar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->