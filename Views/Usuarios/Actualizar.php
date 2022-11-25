<?php

include '../Menu/Header.php';

?>

<div class="ui container">
    <aside id="lateral2">
        <form action="UsuariosControladores.php" method="POST" class="ui form" enctype="multipart/form-data">
            <h4>Actualizar usuario</h4>
            <hr class="separar">
            <input type="hidden" name="action" value="actualizar"> 
            <input type="hidden" name="UsuId" value="<?php echo $user->UsuId;?>">
            <label>Usuario:</label>
            <input type="text" name="UsuUsuario" value="<?php echo $user->UsuUsuario;?>" required><br><br>
            <label>Contraseña:</label>
            <input type="password" name="UsuContrasena"><br><br>
            <label>Nombre del usuario:</label>
            <input type="text" name="UsuNombre" value="<?php echo $user->UsuNombre;?>" required><br><br>
            <label>Rol actual del usuario:</label>
            <select class="ui search dropdown" name="usuariosroles_Roles">
            <?php foreach($usuariosroles as $u):?>
                <?php if($u->Roles==$usuarioroles):?>
                    <option selected value="<?php echo $u->Roles;?>"><?php echo $u->Roles;?></option>
                    <?php else:?>
                    <option value="<?php echo $u->Roles;?>"><?php echo $u->Roles;?></option>
                <?php endif ?>
            <?php endforeach ?>
            </select> <br><br>
            <label>Foto del usuario:</label>
            <img class="ui tiny circular image" src="<?php echo $user->UsuFoto;?>">
            <input type="file" name="UsuFoto" required><br><br>
            <div class="moverboton">
             <button class="ui inverted yellow button">Actualizar</button>
            </div>
        </form>
    </aside>
</div>


<?php

include '../Menu/Footer.php';

?>