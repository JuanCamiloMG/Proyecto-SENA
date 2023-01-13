<?php

include '../Menu/Header.php';

?>

<div class="ui container">
    <aside id="lateral2">  
        
        <?php if(isset($_SESSION['error'])) { ?>
            <div class="ui yellow message">
                <i class="close icon"></i>
                <div class="header">
                    <?php echo $_SESSION['error'];?>
                </div>
                    <p>Intente Loguearse nuevamente</p>
            </div>
        <?php } ?>
        <form action="UsuariosControladores.php" method="POST" class="ui form">
            <h4>Ingresar usuario</h4>
            <hr class="separar">
            <label>Usuario:</label>
            <input type="hidden" name="action" value="verificarlogin">
            <input type="text" name="UsuUsuario"><br><br>
            <label>Contraseña:</label>
            <input type="password" name="UsuContrasena"><br><br>
            <div class="moverbotondos">
             <button type="submit"class="ui inverted yellow button">Ingresar</button>
            </div>

        </form>
    </aside>
</div>

<?php

include '../Menu/Footer.php';

?>
