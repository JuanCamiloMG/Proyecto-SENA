<?php

include '../Menu/Header.php';
//El div me permite hacer unas margenes en la clase ui container, es un contenedor donde se visualiza la informacion del formmulario de registro//
//aside me permite hacer una interfaz dentro del contenedor, le llame lateral ya que en la hoja de styles(estilos) del css tiene una configuracion de diseño//
//Los input o entradas llevaran la informacion a la base de datos, exactamente al campo registrado en la tabla//
//class ui form me permite darle estilo a las casillas del formulario, es decir donde llena la informacion el usuario//
//Como la informacion es vulnerable, se trabajara con un metodo POST//
//enctype es una manera de encriptacion donde el multipart/form-data, me permitira manejar informacion de diferentes archivos, en este caso inputs de tipo file//
//El input de tipo hidden es un tipo de informacion oculta//
?>

<div class="ui container"> 
    <aside id="lateral2">

        <form action="UsuariosControladores.php" method="POST" class="ui form" enctype="multipart/form-data">
            <h4>Crear usuario</h4>
            <hr class="separar">
            <input type="hidden" name="action" value="registrarse"> 
            <label>Usuario:</label>
            <input type="text" name="UsuUsuario" required><br><br>
            <label>Contraseña:</label>
            <input type="password" name="UsuContrasena" required><br><br>
            <label>Nombre del usuario:</label>
            <input type="text" name="UsuNombre" required><br><br>
            <label>Rol actual del usuario:</label>
            <select class="ui search dropdown" name="usuariosroles_Roles" required>
              <?php foreach($usuariosroles as $u){ ?>
              <option value="<?php echo $u->Roles;?>"><?php echo $u->Roles;?></option>
              <?php } ?>
            </select> <br><br>
            <label>Foto del usuario:</label>
            <input type="file" name="UsuFoto" required><br><br>
            <div class="moverboton">
             <button class="ui inverted yellow button">Registrarse</button>
            </div>
        </form>
    </aside>
</div>

<?php

include '../Menu/Footer.php';

?>