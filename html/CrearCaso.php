<?php
$controlador = "CrearCaso";
include("../html/plantilla.php") ?>

<div class="container">
  <form enctype="multipart/form-data" action="../Gestion-Banco/CrearCaso" method="post"  >

    <!-- FORMULARIO DATOS DEL CLIENTE-->


    <div class="input-group mb-3 input-group">

      <!--NOMBRE Y APELLIDO-->
      <div class="input-group-prepend">
        <span class="input-group-text">Nombre y apellido</span>
      </div>

      <input type="text" id="nom" class="form-control" name="nomApe"required>
     
    </div>

    <!--ADVERTENCIA NOMBRE Y APELLIDO -->
    <div id="adver_nom" style="color: red"></div>

    <!--DNI-->
    <div class="input-group mb-3 input-group">

      <select name="tipodoc" class="custom-select">
        <option selected>Tipo de documento</option>
        <option value="DNI">DNI</option>
        <option value="LC">LC</option>
        <option value="LE">LE</option>
        <option value="Otro">Otro</option>
      </select>

      <div class="input-group-prepend">
        <span class="input-group-text">Numero</span>
      </div>

      <input type="text" id="dni" class="form-control" name="numerodoc" maxlength="8"required>

    </div>

    <!--ADVERTENCIA DNI-->
    <div id="adver_DNI" style="color: red"></div>

    <!--MAIL-->
    <div class="input-group mb-3 input-group">

      <div class="input-group-prepend">
        <span class="input-group-text" name="mail">Correo electronico</span>
      </div>

      <input type="text" id="mail" name="mail" class="form-control"required>

    </div>

    <!--ADVERTENCIA MAIL-->
    <div id="adver_mail" style="color: red"></div>

    <!--TEL-->
    <div class="input-group mb-3 input-group">

      <div class="input-group-prepend">
        <span class="input-group-text">Telefono</span>
      </div>

      <input type="text" id="tel" name="telefono" class="form-control" maxlength="15"required>

    </div>

    <!--ADVERTENCIA TEL-->
    <div id="adver_tel" style="color: red"></div>

    <!--OBSERVACIONES-->
    <div class="form-group">

      <label for="comment">Observaciones:</label>
      <textarea name="observaciones" class="form-control" rows="10" id="obser"required></textarea>

    </div>

    <!--ADVERTENCIA OBSERVACIONES-->
    <div id="adver_textarea" style="color: red"></div>

    <!--SELECCIONAR ARCHIVO-->
    <div class="custom-file">
      <input type="file" id="myFile" name="fileName">
    </div>

    <!--BOTONES DERIVAR _ CANCELAR-->
    <button type="button" id="derivar" class="btn btn-outline-primary" style="float: right; margin-left: 10px" data-toggle="modal" data-target="#tagsmodal">Derivar</button>
    <button onclick="cancelar()" type="button" class="btn btn-outline-danger" style="float: right;">Cancelar</button>




    <div class="modal" id="tagsmodal">
      <!-- TAGS PARA EL CASO -->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Ingrese el motivo de la derivación</h4>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="container">
              <div class="form-group">


                <select name="naturaleza" id="naturaleza" class="form-control">
                  <option>Selecciona la naturaleza</option>

                  <?php foreach ($this->naturaleza as $natu) { ?>
                    <option id="<?= $natu['id_naturaleza'] ?>" value="<?= $natu['id_naturaleza'] ?>"><?= $natu['naturaleza'] ?> </option>


                  <?php } ?>

                </select>

                <br>

                <select name="motivo" id="motivo" class="form-control">
                  <option> Selecciona el motivo</option>
                  <?php foreach ($this->motivo as $mot) { ?>
                    <option id="nat<?= $mot['id_naturaleza'] ?>" value="<?= $mot['id_motivo'] ?>"><?= $mot['motivo'] ?> </option>


                  <?php } ?>
                </select>


                <br>

                <select name="submotivo" id="submotivo" class="form-control">
                  <option>Selecciona el submotivo</option>
                  <?php foreach ($this->submot as $subm) { ?>
                    <option id="mot<?= $subm['id_motivo'] ?>" value="<?= $subm['id_submotivo'] ?>"><?= $subm['submotivo'] ?> </option>


                  <?php } ?>
                </select>


              </div>
            </div>
            <a></a>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" id="confirmar" class="btn btn-success">Confirmar</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>


<script>document.getElementById("naturaleza").onchange=function(){ 
  
  var indexnaturaleza=document.getElementById("naturaleza").value;
  var x=document.getElementById("motivo");
  
  var i;
  for (i = 0; i < x.length; i++) {
    if (x.options[i].id == "nat"+indexnaturaleza){
        x.options[i].style.display = 'block';
    }else {
          x.options[i].style.display = 'none';
      }
    }

  //alert(indexnaturaleza);


}
//si selecciona motivo
document.getElementById("motivo").onchange=function(){ 

  var indexmotivo=document.getElementById("motivo").value;
  var y=document.getElementById("submotivo");
  
  var i;
  for (i = 0; i < y.length; i++) {
    if (y.options[i].id == "mot"+indexmotivo){
        y.options[i].style.display = 'block';
    }else {
          y.options[i].style.display = 'none';
      }
    }

  //alert(indexmotivo);

  
  }
</script>

<!-- <script type="text/javascript" src="../html/js/Crear.js"></script> -->

</body>

</html>