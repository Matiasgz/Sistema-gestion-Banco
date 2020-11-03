<?php
$controlador = "Inicio";
 include("../html/plantilla.php") ?>

<div id="tablaNovedades"> <!-- TABLA DE NOVEDADES -->

  <h3>Novedades sobre derivaciones</h3>


  <table class="table table-hover">

    <thead>
      <tr>
        <th>Fecha</th>
        <th>Informacion</th>
        <th><input class="form-control" id="buscador" type="text" placeholder="Buscar informacion..."></th>
      </tr>
    </thead>

    <?php foreach ($this->casos as $caso ) { ?>

    <tbody id="bodyNovedades"> <!-- LISTA NOVEDADES -->
      <tr>
        <td><?= $caso['fecha']?></td>
        <td><?= $caso['descripcion']?></td>
        <td><a href="#" style="text-decoration: none;">Ver mas...</a></td>
      </tr>
 
      
    </tbody>
    <?php } ?>
  </table>
</div>


  <script type="text/javascript" src="inicio.js"></script>

</body>
</html>