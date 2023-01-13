
<?php session_start();

if(empty($_SESSION['UsuNombre'])){
    header("location:Controllers/UsuariosControladores.php?action=login");
}

include 'Menu/Headerindex.php';

?>

<aside id="Bienvenida">
    <h1>Bienvenido:<?php echo $_SESSION['UsuNombre']; ?></h1><br>
    <h1>Area de inyeccion</h1><br>
    <h1>Rol: <?php echo $_SESSION['usuariosroles_Roles']; ?></h1>
</aside>

<?php

include 'Menu/Footerindex.php';

?>
