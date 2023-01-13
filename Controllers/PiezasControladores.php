<?php 

include '../Models/Piezas.php';

class PiezasControllers extends Piezas{

    public function RegistrarPiezas($piezasnombre_Nombre,$piezasmolde_Molde, $pienumero,$piezasmedida_Medida,$piezasproceso_Proceso,$piezasreciclaje_Reciclaje,$piecantidad,$pienombreoperario,$piedescripcion,$piefecha_ingreso,$piefoto)
    {   
        $this->piezasnombre_Nombre = $piezasnombre_Nombre;
        $this->piezasmolde_Molde = $piezasmolde_Molde;
        $this->PieNumero = $pienumero;
        $this->piezasmedida_Medida = $piezasmedida_Medida;
        $this->piezasproceso_Proceso = $piezasproceso_Proceso;
        $this->piezasreciclaje_Reciclaje = $piezasreciclaje_Reciclaje;
        $this->PieCantidad = $piecantidad;
        $this->PieNombreOperario = $pienombreoperario;
        $this->PieDescripcion = $piedescripcion;
        $this->PieFecha_Ingreso = $piefecha_ingreso;
        $piefoto_url = "../Views/Piezas/Foto_Piezas/" . $piefoto['name'];
        copy($piefoto['tmp_name'],$piefoto_url);
        $this->PieFoto = $piefoto_url;
        $this->GuardarPiezasEnBd();
        $this->Redirectregistrar();
    }

    public function ActualizarDatosBd($pieid,$piezastitulo_Titulo,$piezasnombre_Nombre,$piezasmolde_Molde, $pienumero,$piezasmedida_Medida,$piezasproceso_Proceso,$piezasreciclaje_Reciclaje,$piecantidad,$pienombreoperario,$pienombresupervisor,$piedescripcion,$piefecha_ingreso,$piefoto)
    {
        $this->PieId = $pieid;
        $this->piezastitulo_Titulo = $piezastitulo_Titulo;
        $this->piezasnombre_Nombre = $piezasnombre_Nombre;
        $this->piezasmolde_Molde = $piezasmolde_Molde;
        $this->PieNumero = $pienumero;
        $this->piezasmedida_Medida = $piezasmedida_Medida;
        $this->piezasproceso_Proceso = $piezasproceso_Proceso;
        $this->piezasreciclaje_Reciclaje = $piezasreciclaje_Reciclaje;
        $this->PieCantidad = $piecantidad;
        $this->PieNombreOperario = $pienombreoperario;
        $this->PieNombreSupervisor = $pienombresupervisor;
        $this->PieDescripcion = $piedescripcion;
        $this->PieFecha_Ingreso = $piefecha_ingreso;
        $piefoto_url = "../Views/Piezas/Foto_Piezas/" . $piefoto['name'];
        copy($piefoto['tmp_name'],$piefoto_url);
        $this->PieFoto = $piefoto_url;
        $this->ActualizarPiezasEnBd();
        $this->RedirectMostrar();
    }

    public function cargarRegistrese()
    {
        include 'PiezasNombreControladores.php';
        $icp = new PiezasNombreControllers(); 
        $piezasnombre = $icp->ConsultaPiezasNombre();

        include 'PiezasMoldeControladores.php';
        $icp = new PiezasMoldeControllers(); 
        $piezasmolde = $icp->ConsultaPiezasMolde();

        include 'PiezasMedidaControladores.php';
        $icp = new PiezasMedidaControllers(); 
        $piezasmedida = $icp->ConsultaPiezasMedida();

        include 'PiezasProcesoControladores.php';
        $icp = new PiezasProcesoControllers(); 
        $piezasproceso = $icp->ConsultaPiezasProceso();

        include 'PiezasReciclajeControladores.php';
        $icp = new PiezasReciclajeControllers(); 
        $piezasreciclaje = $icp->ConsultaPiezasReciclaje();

        include '../Views/Piezas/Registrese.php';
    }

    public function cargarMostrar()
    {
        $objetopiezas = $this->MostrarPiezasDebd();
        include '../Views/Piezas/Mostrar.php';
    }


    public function ActualizarPiezas($pieid,$piezatitulo,$piezanombre,$piezamolde,$piezamedida,$piezaproceso,$piezareciclaje)
    {
        $this->PieId = $pieid;
        $Piezas = $this->ConsultarPiezasxId();

        include 'PiezasTituloControladores.php';
        $icp = new PiezasTituloControllers(); 
        $piezastitulo = $icp->ConsultaPiezasTitulo();
        $piezatitulo = $piezatitulo;

        include 'PiezasNombreControladores.php';
        $icp = new PiezasNombreControllers(); 
        $piezasnombre = $icp->ConsultaPiezasNombre();
        $piezanombre = $piezanombre;

        include 'PiezasMoldeControladores.php';
        $icp = new PiezasMoldeControllers(); 
        $piezasmolde = $icp->ConsultaPiezasMolde();
        $piezamolde = $piezamolde;

        include 'PiezasMedidaControladores.php';
        $icp = new PiezasMedidaControllers(); 
        $piezasmedida = $icp->ConsultaPiezasMedida();
        $piezamedida = $piezamedida;

        include 'PiezasProcesoControladores.php';
        $icp = new PiezasProcesoControllers(); 
        $piezasproceso = $icp->ConsultaPiezasProceso();
        $piezaproceso = $piezaproceso;

        include 'PiezasReciclajeControladores.php';
        $icp = new PiezasReciclajeControllers(); 
        $piezasreciclaje = $icp->ConsultaPiezasReciclaje();
        $piezareciclaje = $piezareciclaje;

        include '../Views/Piezas/Actualizar.php';

    }

    public function BorrarPiezas($pieid)
    {
        $this->PieId = $pieid;
        $this->BorrarPiezasenBd();
        $this->RedirectMostrar();
    }
    
    public function Redirectregistrar()
    {
        header("location:  ../");
    }
    
    public function Redirectsalir()
    {
        header("location: UsuariosControladores.php?action=login");
    }

    public function RedirectMostrar()
    {
        header("location: PiezasControladores.php?action=mostrarPiezas");
    }

    public function SalirDelSistema()
    {
        session_destroy();
        $this->Redirectsalir();
    }

}

if(isset($_GET['action']) && $_GET['action']=="salir"){
    $ic = new PiezasControllers();
    $ic->SalirDelSistema();
}

if(isset($_GET['action']) && $_GET['action']=="borrar"){
    $ic = new PiezasControllers();
    $ic->BorrarPiezas($_GET['id']);
}

if(isset($_GET['action']) && $_GET['action']=="actualizar"){
    $ic = new PiezasControllers();
    $ic->ActualizarPiezas($_GET['id'],$_GET['titulo'],$_GET['nombre'],$_GET['molde'],$_GET['medida'],$_GET['proceso'],$_GET['reciclaje']);
}

if(isset($_GET['action']) && $_GET['action']=="regisPiezas"){
    $ic = new PiezasControllers();
    $ic->cargarRegistrese();
}

if(isset($_GET['action']) && $_GET['action']=="mostrarPiezas"){
    $ic = new PiezasControllers();
    $ic->cargarMostrar();
}

if(isset($_POST['action']) && $_POST['action']=="registrarse"){
    $ic = new PiezasControllers();
    $ic->RegistrarPiezas($_POST['piezasnombre_Nombre'],$_POST['piezasmolde_Molde'],$_POST['PieNumero'],$_POST['piezasmedida_Medida'],$_POST['piezasproceso_Proceso'],$_POST['piezasreciclaje_Reciclaje'],$_POST['PieCantidad'],$_POST['PieNombreOperario'],$_POST['PieDescripcion'],$_POST['PieFecha_Ingreso'],$_FILES['PieFoto']);
}

if(isset($_POST['action']) && $_POST['action']=="actualizar"){
    $ic = new PiezasControllers();
    $ic->ActualizarDatosBd($_POST['PieId'],$_POST['piezastitulo_Titulo'],$_POST['piezasnombre_Nombre'],$_POST['piezasmolde_Molde'],$_POST['PieNumero'],$_POST['piezasmedida_Medida'],$_POST['piezasproceso_Proceso'],$_POST['piezasreciclaje_Reciclaje'],$_POST['PieCantidad'],$_POST['PieNombreOperario'],$_POST['PieNombreSupervisor'],$_POST['PieDescripcion'],$_POST['PieFecha_Ingreso'],$_FILES['PieFoto']);
}
?>
