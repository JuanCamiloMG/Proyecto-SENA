<?php session_start();
//El controlador trabaja de la mano con el modelo//
//Accedemos a la carpeta modelos al archivos Usuarios.php//
//Lo que vamos hacer es una herencia, es tomar como mias las propiedades que el tiene, es decir las propiedades del archivo Usuario.php//
//Traemos el archivo por medio de un include(incluyame o traigame)//
//los .. dos puntos es salirse una carpeta, ya que nos encontramos trabajando dsede el controlador, se sale de controladores y busca la carpeta con su respectivo archivo//
include '../Models/Usuarios.php';
//Hacemos una extension de la clase user (usuario) del archivo usuario.php//
class UsersControllers extends User{
    //En esta clase controlaremos el registro de usuario, validacion de usuario, actualizacion de usuario y eliminar un usuario//
    //Este metodo me permitira registrar la informacion del usuario,con sus respectivos parametros//
    public function RegistrarUsuario($usuusuario,$usucontrasena,$usunombre,$usuariosroles_Roles,$usufoto)
    {   
        //Encriptar la contraseña para que no la puedan vulnerar//
        //Las variables las escribimos en minuscula con relacion a los atriutos de la tabla usuarios, es para trabajar de una manera mas ordenada//
        $usunuevacontrasena = password_hash($usucontrasena,PASSWORD_ARGON2ID);
        //Las propiedades se asignan con la palabra reservada this//
        //las propiedades vienen de la clase user, se heran en los controladores//
        //las propiedades las escribimos en mayuscula y las variables en minuscula para no confundirnos//
        $this->UsuUsuario = $usuusuario;
        $this->UsuContrasena = $usunuevacontrasena;
        $this->UsuNombre = $usunombre;
        $this->usuariosroles_Roles = $usuariosroles_Roles;
        //Foto url me permite guardar la ruta, adonde voy a guardar la foto, el name me permite copiar el nombre de la fotografia.//
        $usufoto_url = "../Views/Usuarios/Foto_perfil/" . $usufoto['name'];
        //La libreria copy de PHP me permite, que el tmp_name(temporal name) quede en el cache esperando la orden de irse hacia lagun lado//
        //En este caso se dirige al url que es la nueva ruta donde copiara esa informacion//
        //permitiendome en la variable $usufoto_url cargar y mostrar la foto//
        copy($usufoto['tmp_name'],$usufoto_url);
        $this->UsuFoto = $usufoto_url;
        //se ejecuta le metodo de guardar el usuario en base de datos//
        $this->GuardarUsuarioEnBd();
        //Despues de gurdar la informacion en la base de datos, me redireciona a login//
        $this->Redirect();
        //Enviar esta informacion a base de datos
    }
    
    //Se ejecuta el metodo cargarReistrese del metodo GET, sin parametros()//
    public function cargarRegistrese()
    {
        //Entramos a la carpeta vistas, luego a la carpeta Usuarios y alli traemos el archivo Registrese.php//
        //En este archivo el usuario llenara toda la informacion correspondiente para poder registrarse//
        include 'UsuariosRolesControladores.php';
        $icu = new UsuariosRolesControllers(); 
        $usuariosroles = $icu->ConsultaUsuariosRoles();
        include '../Views/Usuarios/Registrese.php';
    }

    //Se ejecuta el metodo cargarMostrar del metodo GET, sin parametros()//
    public function cargarMostrar()
    {
        //El objeto usuario traera la informacion que se guardo en el MostrarUsuarioDebd, que se ubica en el archivo de Usuarios.php//
        $objetousuario = $this->MostrarUsuarioDebd();
        //En este archivo se mostrara los Usuarios registrados en el sistema de informacion//
        include '../Views/Usuarios/Mostrar.php';
    }

    //El metodo VerificarLogin, me permite validar el usuario y contraseña del usuario registrado//
    public function VerificarLogin($usuusuario,$usucontrasena)
    {
        //Las propiedades se asignan con la palabra reservada this//
        //las propiedades vienen de la clase user, se heran en los controladores//
        //las propiedades las escribimos en mayuscula y las variables en minuscula para no confundirnos//
        $this->UsuUsuario = $usuusuario;
        $this->UsuContrasena = $usucontrasena;
        $user = $this->ConsultaVerificarlogin(); 
        if($user=="vacio"){
            $_SESSION["error"] = "Usuario no encontrado en nuestro sistema";
            $this->Redirect();
        }else
        {
            if(password_verify($this->UsuContrasena,$user->UsuContrasena)){
                $_SESSION['UsuUsuario'] = $user->UsuUsuario;
                $_SESSION['UsuNombre'] = $user->UsuNombre;
                $_SESSION['usuariosroles_Roles'] = $user->usuariosroles_Roles;
                $_SESSION['UsuFoto'] = $user->UsuFoto;
                unset($_SESSION['error']);
                $this->RedirectIndex();
            }
            else
            {
                $_SESSION["error"] = "Error de Autenticacion,Usuario y Contraseña Incorrectos!";
                $this->Redirect();
            }
        }
    
    }

    public function cargarlogin()
    {
        include '../Views/Usuarios/Login.php';
    }

    public function ActualizarDatosBd($usuid,$usuusuario,$usucontrasena,$usunombre,$usuariosroles_Roles,$usufoto)
    {
        $usunuevacontrasena = password_hash($usucontrasena,PASSWORD_ARGON2ID);
        $this->UsuId = $usuid;
        $this->UsuUsuario = $usuusuario;
        $this->UsuContrasena = $usunuevacontrasena;
        $this->UsuNombre = $usunombre;
        $this->usuariosroles_Roles = $usuariosroles_Roles;
        $usufoto_url = "../Views/Usuarios/Foto_perfil/" . $usufoto['name'];
        copy($usufoto['tmp_name'],$usufoto_url);
        $this->UsuFoto = $usufoto_url;
        $this->ActualizarUsuarioEnBd();
        $this->RedirectMostrar();
    }

    public function ActualizarUsuario($usuid,$usuarioroles)
    {
        $this->UsuId = $usuid;
        $user = $this->ConsultarUnUsuarioxId();

        include 'UsuariosRolesControladores.php';
        $icu = new UsuariosRolesControllers(); 
        $usuariosroles = $icu->ConsultaUsuariosRoles();
        $usuarioroles = $usuarioroles;

        include '../Views/Usuarios/Actualizar.php';
    }
   
    public function BorrarUsuario($usuid)
    {
        $this->UsuId = $usuid;
        $this->BorrarUsuarioenBd();
        $this->RedirectMostrar();
    }
    
    public function SalirDelSistema()
    {
        session_destroy();
        $this->Redirect();
    }
    //El header es una libreria para poder Redireccionar lo que se encuentre dentro de mi metodo, llegar a la localisacion//
    public function Redirect()
    {
        header("location: UsuariosControladores.php?action=login");
    }
    
    public function RedirectIndex()
    {
        header("location: ../");
    }

    public function RedirectMostrar()
    {
        header("location: UsuariosControladores.php?action=mostrar");
    }

}

//Utilizamos la condicion if(si) y arrancamos con un metodo isset, el cual me permite verificar si una variable llega con algun contenido o llega nula//
//Verificar por  el metodo GET la varibale action, la cual nos permite accionar las cosas en nuestro modelo, concatenando por metodo Get la variable action//
//Traiga una informacion que se llama regis, esta accion nos permite cargar el formulario del registro del usuario//
if(isset($_GET['action']) && $_GET['action']=="regis"){
    //Se instancia al usuario, que es llamar el controlador de la parte superior el UsersControllers//
    $ic = new UsersControllers();
    //Al llamar el controlador le dicimos que ejecute un metodo llamado cargarRegistrese//
    $ic->cargarRegistrese();
}
//Utilizamos la condicion if(si) y arrancamos con un metodo isset, el cual me permite verificar si una variable llega con algun contenido o llega nula//
//Verificar por  el metodo POST la varibale action, la cual nos permite accionar las cosas en nuestro modelo, concatenando por metodo POST la variable action//
//Traiga una informacion que se llama registrarse, esta accion nos permite registra la informacion del regis//
if(isset($_POST['action']) && $_POST['action']=="registrarse"){
    //Se instancia al usuario, que es llamar el controlador de la parte superior el UsersControllers//
    $ic = new UsersControllers();
    //Al llamar el controlador le dicimos que ejecute un metodo llamado RegistrarUsuario con los parametros del POST//
    //La informacion registrada en el formulario llegara a la tabla usuarios a sus respectivos campos, como se muestra en los parametros//
    $ic->RegistrarUsuario($_POST['UsuUsuario'],$_POST['UsuContrasena'],$_POST['UsuNombre'],$_POST['usuariosroles_Roles'],$_FILES['UsuFoto']);
}

if(isset($_GET['action']) && $_GET['action']=="mostrar"){
    $ic = new UsersControllers();
    $ic->cargarMostrar();
}

if(isset($_GET['action']) && $_GET['action']=="login"){
    $ic = new UsersControllers();
    $ic->cargarlogin();
}

if(isset($_POST['action']) && $_POST['action']=="verificarlogin"){
    $ic = new UsersControllers();
    $ic->Verificarlogin($_POST['UsuUsuario'],$_POST['UsuContrasena']);
}

if(isset($_GET['action']) && $_GET['action']=="actualizar"){
    $ic = new UsersControllers();
    $ic->ActualizarUsuario($_GET['id'],$_GET['roles']);
}

if(isset($_POST['action']) && $_POST['action']=="actualizar"){
    $ic = new UsersControllers();
    $ic->ActualizarDatosBd($_POST['UsuId'],$_POST['UsuUsuario'],$_POST['UsuContrasena'],$_POST['UsuNombre'],$_POST['usuariosroles_Roles'],$_FILES['UsuFoto']);
}

if(isset($_GET['action']) && $_GET['action']=="borrar"){
    $ic = new UsersControllers();
    $ic->BorrarUsuario($_GET['id']);
}

if(isset($_GET['action']) && $_GET['action']=="salir"){
    $ic = new UsersControllers();
    $ic->salirDelSistema();
}

?>