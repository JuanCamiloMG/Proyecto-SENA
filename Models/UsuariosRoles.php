<?php

class UsuariosRoles
{
    protected $Id;
    protected $Roles;
    
    protected function MostrarUsuariosRolesDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM usuariosroles";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetousuariosroles = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetousuariosroles;   
    }
}

?>