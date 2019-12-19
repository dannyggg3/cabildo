function sum(){

   $('body').loading();
    $.post("../ajax/deudas.php?op=sum", {  }, function(data, status) {
      data = JSON.parse(data);
      console.log(data)
          $("#count_predios_urbanos").html(data.count_predios_urbanos);
          $("#count_agua_potable").html(data.count_agua_potable);
          $("#count_patente_municipal").html(data.count_patente_municipal);
          $("#count_predios_urbanos_pendi").html(data.count_predios_urbanos_pendi);
          $("#count_agua_potable_pendi").html(data.count_agua_potable_pendi);
          $("#count_patente_municipal_pendi").html(data.count_patente_municipal_pendi);

      $('body').loading('stop');

  });

}

document.addEventListener('DOMContentLoaded',function(){sum()})

