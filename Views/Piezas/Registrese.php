<?php

include '../Menu/HeaderRegistropiezas.php';

?>

<div class="ui container">
  <aside id="lateral">
    <form action="PiezasControladores.php" method="POST" class="ui form" enctype="multipart/form-data">
      <h4>Registro de piezas</h4>
      <hr class="separar">
      <input type="hidden" name="action" value="registrarse"> 
      <label>Nombre de la/s pieza/s:</label>
      <select class="ui search dropdown" name="piezasnombre_Nombre" required>
        <?php foreach($piezasnombre as $p){ ?>
         <option value="<?php echo $p->Nombre;?>"><?php echo $p->Nombre; ?></option>
        <?php } ?>
      </select> <br><br>
      <label id="movermolde">Molde de la/s pieza/s:</label>
      <select class="ui search dropdown" name="piezasmolde_Molde" required>
        <?php foreach($piezasmolde as $p){ ?>
         <option value="<?php echo $p->Molde;?>"><?php echo $p->Molde;?></option>
        <?php } ?>
      </select> <br><br>
      <div class="ui grid">
        <div class= "two column row">
          <div class="column">
            <label>Numero:</label>
            <input type="number" name="PieNumero">
          </div>
          <div class="column">
            <label>Medida:</label>
            <select class="ui search dropdown" name="piezasmedida_Medida" required>
              <?php foreach($piezasmedida as $p){ ?>
                <option value="<?php echo $p->Medida;?>"><?php echo $p->Medida;?></option>
              <?php } ?>
            </select>
          </div>
        </div> 
      </div> <br>
      <div class="ui grid">
        <div class= "two column row">
          <div class="column">
            <label>Proceso de la/s pieza/s:</label>
            <select class="ui search dropdown" name="piezasproceso_Proceso" required>
              <?php foreach($piezasproceso as $p){ ?>
                <option value="<?php echo $p->Proceso;?>"><?php echo $p->Proceso;?></option>
              <?php } ?>
            </select> 
          </div>
          <div class="column">
            <label>Proceso de reciclaje:</label>
            <select class="ui search dropdown" name="piezasreciclaje_Reciclaje" required>
              <?php foreach($piezasreciclaje as $p){ ?>
                <option value="<?php echo $p->Reciclaje;?>"><?php echo $p->Reciclaje;?></option>
              <?php } ?>
            </select> 
          </div> 
        </div>   
      </div><br>
      <label>Cantidad total:</label>
      <input type="number" name="PieCantidad"><br>
      <label>Nombre del operario:</label>
      <input type="text" name="PieNombreOperario">
      <br>
      <label>Descripcion de la/s pieza/s:</label>
      <textarea name="PieDescripcion" required cols="10" rows="5"></textarea>
      <label>Fecha de Ingreso:</label>
      <input type="date" name="PieFecha_Ingreso" required>
      <label>Foto de Pieza:</label>
      <input type="file" name="PieFoto"  required>
      <br><br>
      <div class="moverbotontres">
        <button class="ui inverted yellow button">Registrar</button>
      </div>
    </form>
  </aside>
</div>

<?php

include '../Menu/FooterRegistropiezas.php';

?>