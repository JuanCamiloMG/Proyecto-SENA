<?php

class PiezasMolde
{
    protected $Id;
    protected $Molde;
    
    protected function MostrarPiezasMoldeDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezasmolde";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezasmolde = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezasmolde;
        
    }
}

?>