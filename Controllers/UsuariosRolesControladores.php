<?php 

include '../Models/UsuariosRoles.php';

class UsuariosRolesControllers extends UsuariosRoles
{
    public function ConsultaUsuariosRoles()
    {
        return $this->MostrarUsuariosRolesDeBd();
    }

}

?>