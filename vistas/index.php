<?php

require 'header.php';

?>

        <div class="container-fluid">

        <div class="row" align="center">
            <div class="col-md-12 col-md-offset-2 col-xs-12">
                <img width="20%" src="../public/img/logoMunicipalidad.png" class="img-responsive">
            </div>
        </div>
        <br>


        <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="profile-pic m-b-20 m-t-20">
                                    <img src="../public/img/pelileo.jpg" width="150" class="rounded-circle" alt="user">
                                    <h4 class="m-t-20 m-b-0">PREDIOS URBANOS</h4>

                                </div>
                              
                                <div class="badge badge-pill badge-info font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_predios_urbanos"></span></div>
                                <div class="badge badge-pill badge-danger font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_agua_potable"></span></div>
                            </div>
                            <div class="p-25 border-top m-t-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="buscar_predios_urbanos_abono.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-check font-20 m-r-5"></i>ABONOS</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="buscar_predios_urbanos.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-alert font-20 m-r-5"></i>DEUDAS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="profile-pic m-b-20 m-t-20">
                                <img src="../public/img/pelileo.jpg" width="150" class="rounded-circle" alt="user">
                                    <h4 class="m-t-20 m-b-0">AGUA POTABLE</h4>
                                </div>

                                <div class="badge badge-pill badge-info font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_patente_municipal"></span></div>
                                <div class="badge badge-pill badge-danger font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_predios_urbanos_pendi"></span></div>

                            </div>
                            <div class="p-25 border-top m-t-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="buscar_agua_potable_abono.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-check font-20 m-r-5"></i>ABONOS</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="buscar_agua_potable.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-alert font-20 m-r-5"></i>DEUDAS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="profile-pic m-b-20 m-t-20">
                                <img src="../public/img/pelileo.jpg" width="150" class="rounded-circle" alt="user">
                                    <h4 class="m-t-20 m-b-0">PATENTE MUNICIPAL</h4>
                                </div>
                                <div class="badge badge-pill badge-info font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_agua_potable_pendi"></span></div>
                                <div class="badge badge-pill badge-danger font-16" data-toggle="tooltip" data-placement="top" title="" data-original-title="3 more"><span id="count_patente_municipal_pendi"></span></div>

                            </div>
                            <div class="p-25 border-top m-t-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="buscar_patente_municipal.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-check font-20 m-r-5"></i>ABONOS</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="buscar_patente_municipal_abono.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-alert font-20 m-r-5"></i>DEUDAS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>

                <script type="text/javascript" src="scripts/index.js"></script>
               
<?php

require 'footer.php';

?>

   
      
    
    