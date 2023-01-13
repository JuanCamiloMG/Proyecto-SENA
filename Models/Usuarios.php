<?php

class User{
    //La informacion protegida, nos va a permitir que cualquier persona que trate de instanciar al usuario , no va a poder consultar ninguna informacion//
    //La informacion unica y exclusivamente, es exclusiva para el usuario y las personas que heren esta clase, en este caso el UsuariosControlador.php//
    //Utilizamos los atributos de la tabla usuarios, que sera la informacion a proteger, que no se pueda vulnerar//
    protected $UsuId;
    protected $UsuUsuario;
    protected $UsuContrasena;
    protected $UsuNombre;
    protected $usuariosroles_Roles;
    protected $UsuFoto;

    //Metodo de guardar el usuario en base de datos//
    protected function GuardarUsuarioEnBd()
    {
        //El include_once me permite que si traigo dos veces el mismo archivo, el segundo archivo lo va a omitir o si no nos daria un error//
        include_once '../Config/Connection.php';
        //Hacemos una instancia a la conexion, es decir conectese a la base de datos//
        $ic = new Connection();
        //Creamos una variable sql para nuestros proceso de insercion, es decir haga el query en la tabla usuarios de insertar la informacion del usuario//
        //Utilizamos los marcadores anonimos(?), los cuales me permiten enviar la informacion a la base de datos con los valores correspondientes//
        //los marcadores anonimos deben ser exactos para la insercion de la informacion//
        $sql = "INSERT INTO usuarios (UsuUsuario,UsuContrasena,UsuNombre,usuariosroles_Roles,UsuFoto) values (?,?,?,?,?)";
        //La variable guardar nos servira para guardar la conexion a la base de datos, con la setencia preparada//
        //instanciamos conexion con la propiedad de database, preparamos la setencia para que el sql me haga la insercion de la informacion//
        $guardar = $ic->database->prepare($sql);
        //Vamos a decirle al programa, cuales son los valores a insertar, utilozamos la variable guardar, donde se guardo la conexion y sentencia preparada//
        //Utilizamos el bindParam, es un metodo para asignar marcadores anonimos(?)//
        //En este caso el programa me reconocera el valor anonimo como un bindParam que es enviar la informacion de manera ordenada, tal cual como esta en los campos de la tabla//
        $guardar->bindParam(1,$this->UsuUsuario);
        $guardar->bindParam(2,$this->UsuContrasena);
        $guardar->bindParam(3,$this->UsuNombre);
        $guardar->bindParam(4,$this->usuariosroles_Roles);
        $guardar->bindParam(5,$this->UsuFoto);
        //Finalmente la variable guardar va a ejecutar el proceso, en este caso la informacion a guardar//
        $guardar->execute();
    }

    //Metodo para actualizar el usuario en base de datos//
    protected function ActualizarUsuarioEnBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "UPDATE usuarios SET UsuUsuario='$this->UsuUsuario',UsuContrasena='$this->UsuContrasena',UsuNombre='$this->UsuNombre',usuariosroles_Roles='$this->usuariosroles_Roles',UsuFoto='$this->UsuFoto' WHERE UsuId='$this->UsuId'";
        $actualizar = $ic->database->prepare($sql);
        $actualizar->execute();
    }

    protected function MostrarUsuarioDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM usuarios";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        //Vamos a convertir esta informacion que ejecuto en un objeto//
        //El objetousuario cogera la informacion que tiene en el guardar y haga un recorrido de esa informacion con un fetchALL//
        //El fetchALL es un metodo que nos permite recorrer esa informacion y convertirla en un objeto//
        //El PDO::FETCH_OBJ es una propiedad que nos permite coger la informacion que esta y la convierta  en un objeto, se convierte en un obejeto por que es mas facil trabajar//
        //Un objeto es como trabajar toda la informacion completa de la tabla//
        $objetousuario = $guardar->fetchALL(PDO::FETCH_OBJ);
        //Enviamos al controlador(UsuariosControladores) la informacion completa por medio de un return(retorne), por medio del $objetousuario al metodo cargarMostrar//
        return $objetousuario;
    }

    protected function ConsultaVerificarLogin()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM usuarios WHERE UsuUsuario='$this->UsuUsuario'";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetousuario = $guardar->fetchALL(PDO::FETCH_OBJ);
        //El foreach recorrera el arreglo $objetousuario y lo convertira en este usuario(user), para trabajar el objeto sin problema//
        //Es una arreglo de un solo valor, por que me deja listo el objeto para trabajar, puedo trabajar las propiedades como vienen de la base de datos//
        foreach ($objetousuario as $user) { }
        //La propiedad empty me permite en la condicion, saber si una propiedad me esta llegando vacia o no esta llegando vacia//
        if(empty($user)){
            $user = "vacio";
        }
        //
        return $user;
    }

    protected function ConsultarUnUsuarioxId()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM usuarios WHERE UsuId='$this->UsuId'";
        $mostrar = $ic->database->prepare($sql);
        $mostrar->execute();
        $objetousuario = $mostrar->fetchALL(PDO::FETCH_OBJ);
        foreach ($objetousuario as $user) { }
        if(empty($user)){
            $user = "vacio";
        }
        return $user;
    }

    protected function BorrarUsuarioenBd()
    {
        include_once '../Config/Connection.php';
        $ic = new connection();
        $sql = "DELETE FROM usuarios WHERE UsuId='$this->UsuId'";
        $borrar = $ic->database->prepare($sql);
        $borrar->execute();
    }
}

?>