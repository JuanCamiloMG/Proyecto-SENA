<?php

include '../Menu/HeaderRevisionpiezas.php';

?>

<div class="ui container">
    <h2>Listado de piezas registradas</h2>
    <div class="ui link cards">

        <?php

        foreach ($objetopiezas as $piezas) {
            
        ?>

            <div class="card">
                <div class="image">
                 <img src="<?php echo $piezas->PieFoto;?>">
                </div>
                <div class="content">
                    <label>Titulo del informe:</label>
                    <?php echo $piezas->piezastitulo_Titulo;?>
                </div>
                <div class="content">
                    <label>Nombre de la/s pieza/s:</label>
                    <?php echo $piezas->piezasnombre_Nombre;?>
                </div>    
                <div class="content">
                    <label>Molde de la/s pieza/s:</label>
                    <?php echo $piezas->piezasmolde_Molde;?>
                </div>
                <div class="content">
                    <label>Medida total:</label>
                    <?php echo $piezas->PieNumero;?><?php echo $piezas->piezasmedida_Medida;?>
                </div>
                <div class="content">
                    <label>Proceso de la/s pieza/s:</label>
                    <?php echo $piezas->piezasproceso_Proceso;?>
                </div>
                <div class="content">
                    <label>Proceso de reciclaje:</label>
                    <?php echo $piezas->piezasreciclaje_Reciclaje;?>
                </div>
                <div class="content">
                    <label>Cantidad total:</label>
                    <?php echo $piezas->PieCantidad;?>
                </div>
                <div class="content">
                    <label>Nombre del operario:</label>
                    <?php echo $piezas->PieNombreOperario;?>
                </div>
                <div class="content">
                    <label>Nombre del supervisor:</label>
                    <?php echo $piezas->PieNombreSupervisor;?>
                </div>
                <div class="content">
                    <label>Descripcion de la/s pieza/s:</label>
                    <?php echo $piezas->PieDescripcion;?>
                </div>  
                <div class="content">
                    <label>Fecha de Ingreso:</label>
                    <?php echo $piezas->PieFecha_Ingreso;?>
                </div>   
                
                <div class="extra content">
                    <div class="ui page grid">
                        <div class="three column row">
                            <div class="column">
                                <a href="PiezasControladores.php?action=actualizar&id=<?php echo $piezas->PieId;?>&titulo=<?php echo $piezas->piezastitulo_Titulo;?>&nombre=<?php echo $piezas->piezasnombre_Nombre;?>&molde=<?php echo $piezas->piezasmolde_Molde;?>&medida=<?php echo $piezas->piezasmedida_Medida;?>&proceso=<?php echo $piezas->piezasproceso_Proceso;?>&reciclaje=<?php echo $piezas->piezasreciclaje_Reciclaje;?>"><i class="edit icon"></i></a>
                                
                            </div> 
                            <div class="column">
                             <a href="#" onclick="borrar(<?php echo $piezas->PieId; ?>)"><i class="trash alternate icon"></i></a>
                            </div> 
                            <div class="column">
                                <form action="PdfPagina.php" method="POST">
                                    <input type="hidden" name="texto" value="<?php echo $piezas->piezastitulo_Titulo;?>"> 
                                    <input type="hidden" name="descripcion" value="<?php echo $piezas->piezasnombre_Nombre;?>"> 
                                    <input type="hidden" name="descripcion1" value="<?php echo $piezas->piezasmolde_Molde;?>"> 
                                    <input type="hidden" name="descripcion2" value="<?php echo $piezas->PieNumero;?><?php echo $piezas->piezasmedida_Medida;?>"> 
                                    <input type="hidden" name="descripcion3" value="<?php echo $piezas->piezasproceso_Proceso;?>"> 
                                    <input type="hidden" name="descripcion4" value="<?php echo $piezas->piezasreciclaje_Reciclaje;?>"> 
                                    <input type="hidden" name="descripcion5" value="<?php echo $piezas->PieCantidad;?>"> 
                                    <input type="hidden" name="descripcion6" value="<?php echo $piezas->PieNombreOperario;?>"> 
                                    <input type="hidden" name="descripcion7" value="<?php echo $piezas->PieNombreSupervisor;?>"> 
                                    <input type="hidden" name="descripcion8" value="<?php echo $piezas->PieDescripcion;?>"> 
                                    <input type="hidden" name="descripcion9" value="<?php echo $piezas->PieFecha_Ingreso;?>">
                                    <input type="hidden" name="modo" value="no">
                                    <input type="hidden" name="action" value="pdf">  
                                    <button> <i class="file pdf icon"></i>  </button>

                                </form>
                            </div>
                        </div>  
                    </div> 
                </div>    
            </div> 
        <?php }  ?>  
    </div>        
</div>

<script>

    function borrar(id){

        let resultado = confirm("¿Esta seguro que desea borrar la informacion de esta pieza y el informe?");
        
        if(resultado==true){

            location.href = "PiezasControladores.php?action=borrar&id=" + id;
        }
    
    }
    
</script>
    
<?php

include '../Menu/FooterRevisionpiezas.php';

?>