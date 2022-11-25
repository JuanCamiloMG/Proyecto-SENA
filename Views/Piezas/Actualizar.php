<?php

include '../Menu/HeaderRevisionpiezas.php';

?>

<div class="ui container">
    <aside id="lateral">

        <form action="PiezasControladores.php" method="POST" class="ui form" enctype="multipart/form-data">
            <h4>Informacion general</h4>
            <hr class="separar">
            <input type="hidden" name="action" value="actualizar"> 
            <input type="hidden" name="PieId" value="<?php echo $Piezas->PieId;?>">
            <label>Titulo del informe:</label>
            <select class="ui search dropdown" name="piezastitulo_Titulo">
                <?php foreach($piezastitulo as $p):?>
                    <?php if($p->Titulo==$piezatitulo):?>
                        <option selected value="<?php echo $p->Titulo;?>"><?php echo $p->Titulo;?></option>
                        <?php else:?>
                        <option value="<?php echo $p->Titulo;?>"><?php echo $p->Titulo;?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select><br><br>
            <div class="ui grid"> 
                <div class= "two column row">
                    <div class="column">
                        <label>Nombre de la/s pieza/s:</label>
                        <select class="ui search dropdown" name="piezasnombre_Nombre">
                            <?php foreach($piezasnombre as $p):?>
                                <?php if($p->Nombre==$piezanombre):?>
                                    <option selected value="<?php echo $p->Nombre;?>"><?php echo $p->Nombre;?></option>
                                    <?php else:?>
                                    <option value="<?php echo $p->Nombre;?>"><?php echo $p->Nombre;?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div> 
                    <div class="column">
                        <label id="movermolde">Molde de la/s pieza/s:</label>
                        <select class="ui search dropdown" name="piezasmolde_Molde">
                            <?php foreach($piezasmolde as $p):?>
                                <?php if($p->Molde==$piezamolde):?>
                                    <option selected value="<?php echo $p->Molde;?>"><?php echo $p->Molde;?></option>
                                    <?php else:?>
                                    <option value="<?php echo $p->Molde;?>"><?php echo $p->Molde;?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>     
                </div>                  
            </div> <br> 
            <div class="ui grid">
              <div class= "two column row">
                    <div class="column">
                        <label>Numero:</label>
                        <input type="number" name="PieNumero" value="<?php echo $Piezas->PieNumero;?>">
                    </div>
                    <div class="column">
                        <label>Medida:</label>
                        <select class="ui search dropdown" name="piezasmedida_Medida">
                            <?php foreach($piezasmedida as $p):?>
                                <?php if($p->Medida==$piezamedida):?>
                                    <option selected value="<?php echo $p->Medida;?>"><?php echo $p->Medida;?></option>
                                    <?php else:?>
                                    <option value="<?php echo $p->Medida;?>"><?php echo $p->Medida;?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select> 
                    </div>
                </div> 
            </div> <br> 
            <div class="ui grid"> 
                <div class= "two column row">  
                    <div class="column">    
                        <label>Proceso de la/s pieza/s:</label>
                        <select class="ui search dropdown" name="piezasproceso_Proceso">
                            <?php foreach($piezasproceso as $p):?>
                                <?php if($p->Proceso==$piezaproceso):?>
                                    <option selected value="<?php echo $p->Proceso;?>"><?php echo $p->Proceso;?></option>
                                    <?php else:?>
                                    <option value="<?php echo $p->Proceso;?>"><?php echo $p->Proceso;?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div> 
                    <div class="column">                   
                        <label>Proceso de reciclaje:</label>
                        <select class="ui search dropdown" name="piezasreciclaje_Reciclaje">
                            <?php foreach($piezasreciclaje as $p):?>
                                <?php if($p->Reciclaje==$piezareciclaje):?>
                                    <option selected value="<?php echo $p->Reciclaje;?>"><?php echo $p->Reciclaje;?></option>
                                    <?php else:?>
                                    <option value="<?php echo $p->Reciclaje;?>"><?php echo $p->Reciclaje;?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select> 
                    </div>
                </div>
            </div> <br>
            <label>Cantidad total:</label>
            <input type="number" name="PieCantidad" value="<?php echo $Piezas->PieCantidad;?>"><br>
            <div class="ui grid"> 
                <div class= "two column row"> 
                    <div class="column"> 
                        <label>Nombre del operario:</label>
                        <input type="text" name="PieNombreOperario" value="<?php echo $Piezas->PieNombreOperario;?>">
                    </div>   
                    <div class="column">
                        <label>Nombre del supervisor:</label>
                        <input type="text" name="PieNombreSupervisor" value="<?php echo $Piezas->PieNombreSupervisor;?>">
                    </div> 
                </div>   
            </div>                       
            <label>Descripcion de la/s pieza/s:</label>
            <?php 
                echo "
                <textarea type='text' name='PieDescripcion' rows='5' cols='10'> $Piezas->PieDescripcion </textarea>";
            ?>
            <br>
            <label>Fecha de Ingreso:</label>
            <input type="date" name="PieFecha_Ingreso" value="<?php echo $Piezas->PieFecha_Ingreso;?>">
            <label>Foto de pieza:</label>
            <img class="ui tiny circular image" src="<?php echo $Piezas->PieFoto;?>">
            <input type="file" name="PieFoto" required ><br><br>
            <div class="moverbotontres">
             <button class="ui inverted yellow button">Actualizar</button>
            </div>
        </form>
    </aside>
</div>

<?php

include '../Menu/FooterRevisionpiezas.php';

?>