<?php

class PiezasEliminadas
{
    protected $Id;
    protected $IdPiezas;
    protected $TituloInformes;
    protected $NombrePiezas;
    protected $MoldePiezas;
    protected $Numero;
    protected $Medida;
    protected $Proceso;
    protected $ProcesoReciclaje;
    protected $CantidadPiezas;
    protected $NombreOperario;
    protected $NombreSupervisor;
    protected $DescripcionPiezas;
    protected $FechaIngreso;
    protected $FotoPiezas;
    protected $FechaEliminacion	;

    protected function MostrarPiezasEliminadasDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezaseliminadas";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezaseliminadas = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezaseliminadas;
        
    }
}

?>