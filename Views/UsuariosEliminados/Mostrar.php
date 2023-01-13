<?php

include '../Menu/HeaderUsuariosyPiezas.php';

?>

<div class="ui container">
    <h2>Listado de usuarios eliminados</h2>
    <div class="ui link cards">
        <?php

        foreach ($objetousuarioseliminados as $usuarios) {
            
        ?>
            <div class="card">
                <div class="content">
                    <label>Id eliminado:</label>
                    <?php echo $usuarios->IdUsuarios;?>
                </div> 
                <div class="content">
                    <label>Usuario eliminado:</label>
                    <?php echo $usuarios->Usuarios;?>
                </div> 
                <div class="content">
                    <label>Nombre del usuario eliminado:</label>
                    <?php echo $usuarios->NombresUsuarios;?>
                </div>
                <div class="content">
                    <label>Rol del usuario eliminado:</label>
                    <?php echo $usuarios->RolesUsuarios;?>
                </div>
                <div class="image">
                    <label>Foto del usuario eliminado:</label>
                    <img src=" <?php echo $usuarios->FotosUsuarios;?>">
                </div>  
            </div>
        <?php }  ?>  
    </div>        
</div>
    
<?php

include '../Menu/FooterUsuariosyPiezas.php';

?>