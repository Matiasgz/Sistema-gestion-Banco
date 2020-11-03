
<?php 
$controlador = "CasosPendientes";
include("../html/plantilla.php") ?>
  <div id="casospendientes">
    <!-- casos pendientes -->
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Numero de caso</th>
          <th>Nombre y apellido</th>
          <th>DNI</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($this->casos as $c) {?>
        <tr>
          <td><?= $c['id_caso']?></td>
          <td><?= $c['nombre_apellido']?></td>
          <td><?= $c['DNI']?></td>
          <td><a href="VerCasoPendiente.html">Ver</a></td>
        </tr>
        <?php }?>


      </tbody>
    </table>
  </div>


</body>

</html>