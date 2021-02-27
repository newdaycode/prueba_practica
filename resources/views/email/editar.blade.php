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
                                    <label class="label-text">Asunto</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="editar_asunto" id="editar_asunto" placeholder="Asunto" required="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Destinatario</label>
                                    <div class=" col-md-12">
                                        <input type="email" class="form-control" name="editar_destinatario" id="editar_destinatario" placeholder="Destinatario" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Mensaje</label>
                                    <div class=" col-md-12 mensaje">
                                       
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