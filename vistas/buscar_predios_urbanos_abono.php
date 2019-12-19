<?php

require 'header.php';

?>
        <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h2 class="page-title">BUSQUEDA DE ABONOS DE PREDIOS URBANOS</h2>
                        
                    </div>
                    
                </div>
            </div>

        <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            <input type="text" class='form-control' id='txt_buscar' name='txt_buscar' placeholder='INGRESE EL NÚMERO DE CÉDULA O CUI'>
                            <button type='button' class='btn btn-default btn-block' onclick='listar()'>BUSCAR</button>
                            <button type='button' class='btn btn-warning btn-block' onclick='cargarTotales()'>TOTALES</button>


                            <br>
                            <br>
                            <div class="table-responsive" >
                            <table id="tbllistado" class="table responsive">
                            <thead>
                                <th>PAGAR</th>
                                <th>N_EMISION</th>
                                <th>CUI</th>
                                <th>CEDULA_RUC</th>
                                <th>NOMBRE</th>
                                <th>EMISION</th>
                                <th>VAL_ABONOS</th>
                                <th>INTERES</th>
                                <th>COACTIVA</th>
                                <th>F_EMISION</th>
                                <th>IMPUESTO</th>
                            </thead>
                            <tbody>                            
                            </tbody>
                            <tfoot>
                              
                            </tfoot>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
     
                              <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">DETALLES</h4>
                                            </div>
                                            <div class="modal-body">
                                               

                                            <div class="card-body">

                                        <div class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Número de emisión</label>
                                                <div class="col-md-12">
                                                    <input type="text" id='txt_n_emision' name='txt_n_emision'  class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Ciu</label>
                                                <div class="col-md-12">
                                                    <input type="text" id='txt_ciu' name='txt_ciu'  class="form-control form-control-line" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">RUC</label>
                                                <div class="col-md-12">
                                                    <input type="text" id='txt_ruc' name='txt_ruc' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Nombre</label>
                                                <div class="col-md-12">
                                                    <input type="text"  id='txt_nombre' name='txt_nombre' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Emisión</label>
                                                <div class="col-md-12">
                                                <input type="text"  id='txt_emision' name='txt_emision' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Valor abonos</label>
                                                <div class="col-md-12">
                                                <input type="text"  id='txt_val_abonos' name='txt_val_abonos' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Fecha</label>
                                                <div class="col-md-12">
                                                <input type="text"  id='txt_fecha_emi' name='txt_fecha_emi' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Descripción</label>
                                                <div class="col-md-12">
                                                <input type="text"  id='txt_descripcion' name='txt_descripcion' class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Tipo de impuesto</label>
                                                <div class="col-md-12">
                                                <input type="text"  id='txt_tipo_impuesto' name='txt_tipo_impuesto' class="form-control form-control-line">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                
                                <div id="modal-totales" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">TOTALES</h4>
                                            </div>
                                            <div class="modal-body">
                                               

                                    <div class="card-body">

                                        <div class="form-horizontal form-material">
                                            <div class="form-group">
                                           
                                                <div class="col-md-12">
                                                   <h3>TOTAL EMISION: <strong id="temision"></strong> </h3>
                                                   <h3>TOTAL ABONO: <strong id="tabono"></strong> </h3>
                                                   <h3>TOTAL INTERES: <strong id="tinteres"></strong> </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="modal-pagos" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">PAGAR</h4>
                                            </div>
                                            <div class="modal-body">
                                               

                                            <div class="card-body">

                                           
                            <div class="card-body">
                                
                              
                              
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iprofile" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true" aria-selected="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Tarjeta de crédito</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#ihome" class="nav-link " aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false" aria-selected="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span> 
                                        <span class="hidden-xs">Paypal</span>
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane " id="ihome">
                                        <br> You can pay your money through paypal, for more info <a href="">click here</a>
                                        <br>
                                        <br>
                                        <button class="btn btn-info"><i class="fab fa-cc-paypal"></i> Pay with Paypal</button>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="iprofile">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-cc-visa"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="numCard" id="numCard" placeholder="Card Number" aria-label="Amount (to the nearest dollar)">
                                                        <input type="hidden" class="form-control" name="id_pago" id="id_pago">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>EXPIRATION DATE</label>
                                                                <input type="text" class="form-control" name="Expiry" id="Expiry" placeholder="MM / YY" required=""> </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>CV CODE</label>
                                                                <input type="text" class="form-control" name="CVC"  id="CVC" placeholder="CVC" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>NAME OF CARD</label>
                                                                <input type="text" class="form-control" name="nameCard" id="nameCard" placeholder="nombre"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info" type="button" onclick='realizarPago()' >Realizar pago</button>
                                               
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                    


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>



<?php

require 'footer.php';

?>
<script type="text/javascript" src="scripts/buscar_predios_urbanos_abono.js"></script>
   
      
    
    