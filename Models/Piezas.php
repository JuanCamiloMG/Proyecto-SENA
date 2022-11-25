<?php

class Piezas
{
    protected $PieId;
    protected $piezastitulo_Titulo;
    protected $piezasnombre_Nombre;
    protected $piezasmolde_Molde;
    protected $PieNumero;
    protected $piezasmedida_Medida;
    protected $piezasproceso_Proceso;
    protected $piezasreciclaje_Reciclaje;
    protected $PieCantidad;
    protected $PieNombreOperario;
    protected $PieNombreSupervisor;
    protected $PieDescripcion;
    protected $PieFecha_Ingreso;
    protected $PieFoto;

    
    protected function GuardarPiezasEnBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "INSERT INTO piezas (piezasnombre_Nombre,piezasmolde_Molde,PieNumero,piezasmedida_Medida,piezasproceso_Proceso,piezasreciclaje_Reciclaje,PieCantidad,PieNombreOperario,PieDescripcion,PieFecha_Ingreso,PieFoto) values (?,?,?,?,?,?,?,?,?,?,?)";
        $guardar = $ic->database->prepare($sql);
        $guardar->bindParam(1,$this->piezasnombre_Nombre);
        $guardar->bindParam(2,$this->piezasmolde_Molde);
        $guardar->bindParam(3,$this->PieNumero);
        $guardar->bindParam(4,$this->piezasmedida_Medida);
        $guardar->bindParam(5,$this->piezasproceso_Proceso);
        $guardar->bindParam(6,$this->piezasreciclaje_Reciclaje);
        $guardar->bindParam(7,$this->PieCantidad);
        $guardar->bindParam(8,$this->PieNombreOperario);
        $guardar->bindParam(9,$this->PieDescripcion);
        $guardar->bindParam(10,$this->PieFecha_Ingreso);
        $guardar->bindParam(11,$this->PieFoto);
        $guardar->execute();
    }

    protected function ActualizarPiezasEnBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "UPDATE piezas SET piezastitulo_Titulo='$this->piezastitulo_Titulo',piezasnombre_Nombre='$this->piezasnombre_Nombre',piezasmolde_Molde='$this->piezasmolde_Molde',PieNumero='$this->PieNumero',piezasmedida_Medida='$this->piezasmedida_Medida',piezasproceso_Proceso='$this->piezasproceso_Proceso',piezasreciclaje_Reciclaje='$this->piezasreciclaje_Reciclaje',PieCantidad='$this->PieCantidad',PieNombreOperario='$this->PieNombreOperario',PieNombreSupervisor='$this->PieNombreSupervisor',PieDescripcion='$this->PieDescripcion',PieFecha_Ingreso='$this->PieFecha_Ingreso',PieFoto='$this->PieFoto' WHERE PieId='$this->PieId'";
        $actualizar = $ic->database->prepare($sql);
        $actualizar->execute();
    }

    protected function MostrarPiezasDeBd()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezas";
        $guardar = $ic->database->prepare($sql);
        $guardar->execute();
        $objetopiezas = $guardar->fetchALL(PDO::FETCH_OBJ);
        return $objetopiezas;
    }

    protected function ConsultarPiezasxId()
    {
        include_once '../Config/Connection.php';
        $ic = new Connection();
        $sql = "SELECT * FROM piezas WHERE PieId='$this->PieId'";
        $mostrar = $ic->database->prepare($sql);
        $mostrar->execute();
        $objetopiezas = $mostrar->fetchALL(PDO::FETCH_OBJ);
        foreach ($objetopiezas as $piezas) { }
        if(empty($piezas)){
            $piezas = "vacio";
        }
        return $piezas;
    }

    protected function BorrarPiezasenBd()
    {
        include_once '../Config/Connection.php';
        $ic = new connection();
        $sql = "DELETE FROM piezas WHERE PieId='$this->PieId'";
        $borrar = $ic->database->prepare($sql);
        $borrar->execute();
    }
}

?>