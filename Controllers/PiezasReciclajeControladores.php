<?php 

include '../Models/PiezasReciclaje.php';

class PiezasReciclajeControllers extends PiezasReciclaje
{
    public function ConsultaPiezasReciclaje()
    {
        return $this->MostrarPiezasReciclajeDeBd();
    }

}

?>