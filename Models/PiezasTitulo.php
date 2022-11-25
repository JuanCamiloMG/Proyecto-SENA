<?php

class PiezasTitulo
{
    protected $Id;
    protected $Titulo;
    
    protected function MostrarPiezasTituloDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezastitulo";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezastitulo = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezastitulo;
        
    }
}

?>