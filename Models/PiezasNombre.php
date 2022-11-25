<?php

class PiezasNombre
{
    protected $Id;
    protected $Nombre;
    
    protected function MostrarPiezasNombreDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezasnombre";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezasnombre = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezasnombre;

    }
}

?>