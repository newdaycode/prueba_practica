<!-- Inicio Modal -->
<div id="ModalRegistro" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Registro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                    <label class="label-text">Asunto</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Destinatario</label>
                                    <div class=" col-md-12">
                                        <input type="email" class="form-control" name="destinatario" id="destinatario" placeholder="Destinatario" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Mensaje</label>
                                    <div class=" col-md-12">
                                        <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
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