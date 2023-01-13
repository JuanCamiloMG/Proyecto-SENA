<?php 

include '../Models/PiezasMolde.php';

class PiezasMoldeControllers extends PiezasMolde
{
    public function ConsultaPiezasMolde()
    {
        return $this->MostrarPiezasMoldeDeBd();
    }

}

?>
