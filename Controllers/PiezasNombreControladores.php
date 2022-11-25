<?php 

include '../Models/PiezasNombre.php';

class PiezasNombreControllers extends PiezasNombre
{
    public function ConsultaPiezasNombre()
    {
        return $this->MostrarPiezasNombreDeBd();
    }

}

?>

