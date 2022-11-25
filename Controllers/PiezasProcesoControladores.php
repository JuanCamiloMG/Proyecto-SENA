<?php 

include '../Models/PiezasProceso.php';

class PiezasProcesoControllers extends PiezasProceso
{
    public function ConsultaPiezasProceso()
    {
        return $this->MostrarPiezasProcesoDeBd();
    }

}

?>