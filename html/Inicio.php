<?php
$controlador = "Inicio";
include("../html/plantilla.php") ?>

<div class="container">
  <div id="tablaNovedades">
    <!-- TABLA DE NOVEDADES -->

    <h3>Novedades sobre derivaciones</h3>


    <table class="table table-hover">

      <thead>
        <tr>
          <th>Fecha</th>
          <th>Informacion</th>
         
        </tr>
      </thead>



      <tbody id="bodyNovedades">
        <!-- LISTA NOVEDADES -->
        <?php foreach ($this->casos as $caso) { ?>
          <tr>
            <td><?= $caso['fecha'] ?></td>
            <td><?= $caso['descripcion'] ?></td>
           
        <?php } ?>

      </tbody>

    </table>
  </div>
</div>

<!-- <script type="text/javascript" src="../html/js/inicio.js"></script>-->


</body>

</html>