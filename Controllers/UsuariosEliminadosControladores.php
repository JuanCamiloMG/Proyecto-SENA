<?php 

include '../Models/UsuariosEliminados.php';

class UsuariosEliminadosControllers extends UsuariosEliminados
{
    public function ConsultaUsuariosEliminados()
    {
        return $this->MostrarUsuariosEliminadosDeBd();
    }

    public function UsuariosEliminados()
    {
        
        $objetousuarioseliminados = $this->MostrarUsuariosEliminadosDeBd(); 
        include '../Views/UsuariosEliminados/Mostrar.php';
    }
    
}

if(isset($_GET['action']) && $_GET['action']=="mostrareliminados"){
    $ic = new UsuariosEliminadosControllers();
    $ic->UsuariosEliminados();
}

?>

