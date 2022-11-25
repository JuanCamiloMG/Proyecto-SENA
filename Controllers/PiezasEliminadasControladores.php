<?php 

include '../Models/PiezasEliminadas.php';

class PiezasEliminadasControllers extends  PiezasEliminadas
{
    public function ConsultaPiezasEliminadas()
    {
        return $this->MostrarPiezasEliminadasDeBd();
    }

    public function PiezasEliminadas()
    {
        $objetopiezaseliminadas = $this->MostrarPiezasEliminadasDeBd(); 
        include '../Views/PiezasEliminadas/Mostrar.php';
    }

}

if(isset($_GET['action']) && $_GET['action']=="mostrareliminadas"){
    $ic = new PiezasEliminadasControllers();
    $ic->PiezasEliminadas();
}

?>
