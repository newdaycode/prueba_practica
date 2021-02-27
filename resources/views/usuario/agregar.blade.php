<!-- Inicio Modal -->
<div id="ModalRegistro" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Registro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
             <form id="FormRegistro" method="post" action="javascript:void(0)">
                 @csrf
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
                                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" required="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Apellidos</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required="">
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
                                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required="">
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
                                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de nacimiento" required="">
                                        <div id="msj"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Edad</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="edad" id="edad" placeholder="Edad" required="" readonly="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">País</label>
                                    <div class=" col-md-12">
                                        <select class="form-control" title="Pais" name="pais" id="pais" required="required">
                                            <option value="">Selecione...</option>
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
                                        <select class="form-control" title="Estado" name="estado" id="estado" required="required">
                                            <option value="">Selecione...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Ciudad</label>
                                    <div class=" col-md-12">
                                        <select class="form-control" title="Ciudad" name="ciudad" id="ciudad" required="required">
                                            <option value="">Selecione...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Clave</label>
                                    <div class=" col-md-12">
                                        <input type="password" class="form-control btn-submit" name="clave" id="clave" placeholder="Clave" required="">
                                    </div>
                                </div>
                            </div> 

                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-outline-primary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" id="agregar" class="btn btn-rounded btn-primary">REGISTRAR</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->