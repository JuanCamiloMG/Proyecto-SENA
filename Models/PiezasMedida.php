<?php

class PiezasMedida
{
    protected $Id;
    protected $Medida;
    
    protected function MostrarPiezasMedidaDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezasmedida";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezasmedida = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezasmedida;
        
    }
}

?>