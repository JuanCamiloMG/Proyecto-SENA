<?php

class PiezasReciclaje
{
    protected $Id;
    protected $Reciclaje;
    
    protected function MostrarPiezasReciclajeDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezasreciclaje";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezasreciclaje = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezasreciclaje;    
    }
}

?>