<?php 

include '../Models/PiezasMedida.php';

class PiezasMedidaControllers extends PiezasMedida
{
    public function ConsultaPiezasMedida()
    {
        return $this->MostrarPiezasMedidaDeBd();
    }

}

?>