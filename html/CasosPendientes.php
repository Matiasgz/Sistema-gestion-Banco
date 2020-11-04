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
    <?php foreach ($this->casos as $c) { ?>
      <tbody>

        <tr>
          <td><?= $c['id_caso'] ?></td>
          <td><?= $c['nombre_apellido'] ?></td>
          <td><?= $c['DNI'] ?></td>
          <td><button type="button" id="ver" class="btn btn-outline-primary" data-toggle="modal" data-target="#tagsmodal<?= $c['id_caso'] ?>">Ver</button></td>
        </tr>

        <div class="modal" id="tagsmodal<?= $c['id_caso'] ?>" style="min-width: 750px;">
          <!-- TAGS PARA EL CASO -->
          <div class="modal-dialog modal-dialog-centered" style="min-width: 750px;">
            <div class="modal-content" style="min-width: 750px;">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Ingrese el motivo de la derivación</h4>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="container">
                  <div class="form-group">

                    <div class="input-group mb-3 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">CASO</span>
                      </div>
                      <input type="text" class="form-control" disabled placeholder="<?= $c['id_caso'] ?>">
                    </div>

                    <div class="input-group mb-3 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Nombre y apellido</span>
                      </div>
                      <input type="text" class="form-control" disabled placeholder="<?= $c['nombre_apellido'] ?>">
                    </div>

                    <div class="input-group mb-3 input-group">
                      <select name="tipodni" class="custom-select" disabled>
                        <option selected>DNI</option>
                        <option value="DNI">DNI</option>
                        <option value="LC">LC</option>
                        <option value="LE">LE</option>
                        <option value="Otro">Otro</option>
                      </select>
                      <div class="input-group-prepend">
                        <span class="input-group-text">Numero</span>
                      </div>
                      <input type="text" class="form-control" disabled placeholder="<?= $c['DNI'] ?>">
                    </div>

                    <div class="input-group mb-3 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Correo electronico</span>
                      </div>

                      <input type="text" class="form-control" value="<?= $c['mail'] ?>" id="correoIngresado" readonly="readonly">

                      <div class="input-group-append">
                        <a class="btn btn-outline-primary" onclick="copiar()">Copiar</a>
                      </div>
                    </div>

                    <div class="input-group mb-3 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Telefono</span>
                      </div>
                      <input type="text" class="form-control" disabled placeholder="<?= $c['tel'] ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="comment">Observaciones:</label>
                      <textarea class="form-control" rows="10" id="comment" disabled placeholder="<?= $c['descripcion'] ?>"></textarea>
                    </div>

                  </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="display: block;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left, display:block;">Cerrar</button>
                  <a class="btn btn-outline-primary" style="float: right;" data-toggle="modal" data-target="#tomarcaso<?= $c['id_caso'] ?>">Tomar caso</a>
                </div>


                <div class="modal fade" id="tomarcaso<?= $c['id_caso'] ?>">
                  <!-- MODAL CASO TOMADO -->
                  <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 500px;">
                    <div class="modal-content" style="max-width: 500px;">

                      <form action="../proyectolaboratorio4/CasosPendientes" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Resolución</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <!-- NATURALEZA - MOTIVO - SUB MOTIVO -->

                          <div class="container">
                            <div class="input-group mb-3 input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Naturaleza</span>
                              </div>
                              <input type="text" class="form-control" disabled placeholder="<?= $c['naturaleza'] ?>">
                            </div>

                            <div class="input-group mb-3 input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Motivo</span>
                              </div>
                              <input type="text" class="form-control" disabled placeholder="<?= $c['motivo'] ?>">
                            </div>

                            <div class="input-group mb-3 input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Submotivo</span>
                              </div>
                              <input type="text" class="form-control" disabled placeholder="<?= $c['submotivo'] ?>">
                            </div>
                          </div>



                          <div class="form-group">
                            <!-- TEXT AREA -->
                            <label for="resolucion">Respuesta:</label>
                            <textarea class="form-control" rows="5" name="resolucion" id="resolucion" placeholder="Ingrese la resolución del caso..."></textarea>
                          </div>


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer" style="display:block;">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left, display:block;">Cerrar</button>
                          <button type="submit" class="btn btn-success" style="float: right;">Resolver</button>
                        </div>

                        <input type="hidden" name="numcaso" value="<?= $c['id_caso'] ?>">

                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </tbody>
    <?php } ?>

  </table>
</div>


</body>

</html>