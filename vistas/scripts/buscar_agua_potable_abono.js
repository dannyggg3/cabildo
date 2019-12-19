var tabla;
var kushki;
var totalCarr;

function inico() {
   
    listar();
}

function cargarTotales(){

    var texto=$('#txt_buscar').val();

    $('body').loading();
      $.post("../ajax/abonos.php?op=totalesagua_potable&text="+texto, { "texto":texto }, function(data, status) {
        data = JSON.parse(data);
        console.log(data)
            $("#temision").html(data.totalemision)
            $("#tabono").html(data.totalabono)
            $("#tinteres").html(data.totalinteres)
            $('#modal-totales').modal('show');

        $('body').loading('stop');

       
    });
}

function listar() {

    var texto=$('#txt_buscar').val();

  tabla = $("#tbllistado").dataTable({
      "aProcessing": true, 
      "aServerSide": true, 
      dom: "Bfrtip", 
      buttons: [{
              extend: "pdfHtml5",
              title: "DEUDAS"
          }
      ],
     //ajax metodo post ara cojes los datos pero envio por get la variable op
      "ajax": {
          url: "../ajax/abonos.php?op=buscar_agua_potable&text="+texto,
          type: "get",
          dataType: "json",
          error: function(e) {
              console.log(e.responseText);
          },
      },
      "bDestroy": true,
      "iDisplayLength": 20, 
      "order": [
              [0, "desc"]
          ]
  }).DataTable();
}

function detalles(num_emision){
   
   

    $.post("../ajax/abonos.php?op=mostrarDetalles", { num_emision: num_emision }, function(data, status) {
        data = JSON.parse(data);
   
        $('#txt_n_emision').val(data.NROEMISION);
        $('#txt_ciu').val(data.CIU);
        $('#txt_ruc').val(data.CEDULA_RUC);
        $('#txt_nombre').val(data.NOMBRES);
        $('#txt_emision').val(data.EMISION);
        $('#txt_val_abonos').val(data.VAL_ABONOS);
        $('#txt_fecha_emi').val(data.FEMI);
        $('#txt_descripcion').val(data.DESCRIPCION);
        $('#txt_tipo_impuesto').val(data.IMPUESTO);
    });

    $('#responsive-modal').modal('show');
}

function pagar(id,total){
    $('#id_pago').val(id);
    totalCarr=total;
    
    $('#modal-pagos').modal('show');

}

function realizarPago(){

   var id= $('#id_pago').val();
   var numCard=$('#numCard').val();
   var Expiry=$('#Expiry').val();
   var CVC=$('#CVC').val();
   var nameCard=$('#nameCard').val();

    $.post("../ajax/abonos.php?op=realizarPago", { 
        id: id,
        totalCarr : totalCarr, 
        numCard : numCard, 
        Expiry : Expiry, 
        CVC : CVC, 
        nameCard : nameCard
    }, function(e) {
       
            swal("DETALLES DEl PAGO", e, "success");
           
      
    });
}

inico();