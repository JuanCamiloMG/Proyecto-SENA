<?php

class UsuariosEliminados
{
    protected $Id;
    protected $IdUsuarios;
    protected $Usuarios;
    protected $Contrasenas;
    protected $NombresUsuarios;
    protected $RolesUsuarios;
    protected $FotosUsuarios;
    protected $FechaEliminacion;

    protected function MostrarUsuariosEliminadosDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM usuarioseliminados";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetousuarioseliminados = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetousuarioseliminados;   
    }
}

?>