
<?php
$controlador = "BuscarCaso";
 include("../html/plantilla.php") ?>

<div class="container"> <!-- CONTAINER GENERAL -->

    <div class="input-group mb-3">
              <input type="text" class="form-control " id="txtbusca" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2">
          <div class="input-group-append ">
              <span class="input-group-text" id="basic-addon2">BUSCAR</span>
          </div>
    </div>
   
    <div class="table-responsive-sm">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Fecha</th>
          <th>Nombre y apellido</th>
          <th>Documento</th>
          
          <th>Descripcion del caso</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody class="tbody" id="tbody">


      </tbody>
     
    </table>
    </div>

</div>


</body>

<script>




 $(document).ready(function(){
         $("#txtbusca").keyup(function(){
              var parametros="txtbusca="+$(this).val();
              var Table = document.getElementById("tbody"); 
                  Table.innerHTML = ""; 
              $.ajax({
                    data:  parametros,
                    url: '../Gestion-Banco/BuscarCasos',
                    type:'post',
                    beforeSend: function () { },
                    success:  function (response) {   
                     //datos = json_decode(response); 

                     
                     
                     
                     
                     var datos = $.parseJSON(response);
                     for (var i = 0; i < datos.length; i++){

                           
                            if(datos[i].estado == 1) $estado = "Finalizado";
                            else $estado = "Pendiente";
                            
                            $("#tbody").append('<tr>' + 
                              '<td align="center" style="dislay: none;">' + datos[i].fecha  + '</td>'+
                              '<td align="center" style="dislay: none;">' + datos[i].nombre_apellido + '</td>'+
                              '<td align="center" style="dislay: none;">' + datos[i].DNI + '</td>'+
                              '<td align="center" style="dislay: none;">' + datos[i].descripcion + '</td>'+
                              '<td align="center" style="dislay: none;">' + $estado + '</td>'+'</tr>');
                              }


                      //  $(".salida").html(response);
                  },
                  error:function(){
                       alert("error")
                    }
               });
         })
})
</script>

</html>