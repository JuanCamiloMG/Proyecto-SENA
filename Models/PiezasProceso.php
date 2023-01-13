<?php

class PiezasProceso
{
    protected $Id;
    protected $Proceso;
    
    protected function MostrarPiezasProcesoDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezasproceso";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezasproceso = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezasproceso;
        
    }
}

?>