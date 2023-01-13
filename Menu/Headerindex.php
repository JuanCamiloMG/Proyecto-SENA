<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/semantic.css">
  <link rel="stylesheet" href="Css/style.css">
  <script src="Js/jquery-3.1.1.min.js"></script>
  <script src="Js/semantic.js"></script>
  <title>Fliv Industrias</title>
  <link rel="icon" href="Img/Logo FlivIndustrias.jpg">
</head>
<body>

  <?php if(isset($_SESSION['usuariosroles_Roles']) && $_SESSION['usuariosroles_Roles']=="Gerente") {?>
    <div class="ui inverted menu">
      <div class="item">
        <img src="Img/Logo FlivIndustrias.jpg">
      </div>
      
      <div class="ui dropdown item">
        Informacion de usuarios
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="Controllers/UsuariosEliminadosControladores.php?action=mostrareliminados" class="item">Usuarios eliminados</a>
        </div>
      </div>
      <div class="ui dropdown item">
        Informacion de piezas
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="Controllers/PiezasEliminadasControladores.php?action=mostrareliminadas" class="item">Piezas eliminadas</a>
        </div>
      </div>
      <a href="Controllers/UsuariosControladores.php?action=salir" class="right item">Salir</a>
    </div>
  <?php } ?>
  
  <?php if(isset($_SESSION['usuariosroles_Roles']) && $_SESSION['usuariosroles_Roles']=="Supervisor") {?>
    <div class="ui inverted menu">
      <div class="item">
        <img src="Img/Logo FlivIndustrias.jpg">
      </div>
      
      <div class="ui dropdown item">
        Generar Informes
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="Controllers/PiezasControladores.php?action=mostrarPiezas" class="item">Revision de piezas</a>
        </div>
      </div>
      <a href="Controllers/UsuariosControladores.php?action=salir" class="right item">Salir</a>
    </div>
  <?php } ?>

  <?php if(isset($_SESSION['usuariosroles_Roles']) && $_SESSION['usuariosroles_Roles']=="Operario") {?>
    <div class="ui inverted menu">
      <div class="item">
        <img src="Img/Logo FlivIndustrias.jpg">
      </div>
      <div class="ui dropdown item">
        Registrar informacion de piezas
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="Controllers/PiezasControladores.php?action=regisPiezas" class="item">Registro de piezas</a>
        </div>
      </div>
      <a href="Controllers/UsuariosControladores.php?action=salir" class="right item">Salir</a>
    </div>
  <?php } ?>
