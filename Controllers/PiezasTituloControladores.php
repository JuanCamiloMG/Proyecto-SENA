<?php 

include '../Models/PiezasTitulo.php';

class PiezasTituloControllers extends PiezasTitulo
{
    public function ConsultaPiezasTitulo()
    {
        return $this->MostrarPiezasTituloDeBd();
    }

}

?>