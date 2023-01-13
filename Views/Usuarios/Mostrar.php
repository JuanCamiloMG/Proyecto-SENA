<?php

include '../Menu/Header.php';
//El div me permite hacer unas margenes en la clase ui container, es un contenedor donde se visualiza la informacion del formmulario de registro//
//ui link cards es una division de cartas del framework de semantic//
//El foreach es un ciclo que nos permite recorrer arreglos u objetos, es una variacion del ciclo For//
// El foreach recorrera el $objetousuario y lo guardara en una variable $usuario, en esta varaible guardaremos la informacion//
//Las etiquetas de php se utilizan en el echo para hacer un llamado a los atributos donde se guardo la informacion, para poderla mostrar//

?>

<div class="ui container">
    <h2>Listado de usuarios registrados</h2>
    <div class="ui link cards">

        <?php

        foreach ($objetousuario as $usuario) {
            
        ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $usuario->UsuFoto;?>">
                </div>
                <div class="content">
                    <label>Nombre del usuario:</label>
                    <?php echo $usuario->UsuNombre;?>
                </div> 
                <div class="content">
                    <label>Usuario:</label>
                    <?php echo $usuario->UsuUsuario;?>
                </div> 
                <div class="content">
                    <label>Rol del usuario:</label>
                    <?php echo $usuario->usuariosroles_Roles;?>
                </div> 
                <div class="extra content">
                    <span class="right floated">
                        <a href="UsuariosControladores.php?action=actualizar&id=<?php echo $usuario->UsuId;?>&roles=<?php echo $usuario->usuariosroles_Roles;?>"><i class="edit icon"></i></a>
                        <a href="#" onclick="borrar(<?php echo $usuario->UsuId;?>)"><i class="trash icon"></i></a>
                    </span>
                </div>    
            </div>
        <?php }  ?>  
    </div>        
</div>

<script>

    function borrar(id){

        let resultado = confirm("¿Esta seguro que desea borrar a este usuario?");
        
        if(resultado==true){

            location.href = "UsuariosControladores.php?action=borrar&id=" + id ;
        }
    }
    
</script>
    
<?php

include '../Menu/Footer.php';

?>