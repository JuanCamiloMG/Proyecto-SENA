<?php

include '../Menu/HeaderUsuariosyPiezas.php';

?>

<div class="ui container">
    <h2>Listado de piezas eliminadas</h2>
    <div class="ui link cards">
        <?php

        foreach ($objetopiezaseliminadas as $piezas) {
            
        ?>
            <div class="card">
                <div class="content">
                    <label>Id eliminado:</label>
                    <?php echo $piezas->IdPiezas;?>
                </div> 
                <div class="content">
                    <label>Titulo del informe:</label>
                    <?php echo  $piezas->TituloInformes;?>
                </div> 
                <div class="content">
                    <label>Nombre de la/s pieza/s:</label>
                    <?php echo $piezas->NombrePiezas;?>
                </div>    
                <div class="content">
                    <label>Molde de la/s pieza/s:</label>
                    <?php echo $piezas->MoldePiezas;?>
                </div>
                <div class="content">
                    <label>Medida total:</label>
                    <?php echo $piezas->Numero;?><?php echo $piezas->Medida;?>
                </div>
                <div class="content">
                    <label>Proceso de la/s pieza/s:</label>
                    <?php echo $piezas->Proceso;?>
                </div>
                <div class="content">
                    <label>Proceso de reciclaje:</label>
                    <?php echo $piezas->ProcesoReciclaje;?>
                </div>
                <div class="content">
                    <label>Cantidad total:</label>
                    <?php echo $piezas->CantidadPiezas;?>
                </div>
                <div class="content">
                    <label>Nombre del operario:</label>
                    <?php echo $piezas->NombreOperario;?>
                </div>
                <div class="content">
                    <label>Nombre del supervisor:</label>
                    <?php echo $piezas->NombreSupervisor;?>
                </div>
                <div class="content">
                    <label>Descripcion de la/s pieza/s:</label>
                    <?php echo $piezas->DescripcionPiezas;?>
                </div>  
                <div class="content">
                    <label>Fecha de Ingreso:</label>
                    <?php echo $piezas->FechaIngreso;?>
                </div>  
                <div class="image">
                    <label>Foto de la/s pieza/s:</label>
                    <img src=" <?php echo $piezas->FotoPiezas;?>">
                </div>   
            </div>
        <?php }  ?>  
    </div>        
</div>
    
<?php

include '../Menu/FooterUsuariosyPiezas.php';

?>