var tabla;

function inico() {
   
    listar();
}

function listar() {
  tabla = $("#tbllistado").dataTable({
      "aProcessing": true, 
      "aServerSide": true, 
      dom: "Bfrtip", 
      buttons: [{
              extend: "pdfHtml5",
              title: "DEUDAS"
          },
          "copyHtml5",
          "excelHtml5",
          "csvHtml5"
      ],
     //ajax metodo post ara cojes los datos pero envio por get la variable op
      "ajax": {
          url: "../ajax/deudas.php?op=emi03",
          type: "get",
          dataType: "json",
          error: function(e) {
              console.log(e.responseText);
          }
      },
      "bDestroy": true,
      "iDisplayLength": 20, 
      "order": [
              [0, "desc"]
          ]
  }).DataTable();
}