<?php 
require_once '../vendor/autoload.php'; 

use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;
class PdfPagina{

public function post_crear_pdf()
  {
    
    try {
      $texto     = $_POST["texto"];
      $descripcion = $_POST["descripcion"];
      $descripcion1 = $_POST["descripcion1"];
      $descripcion2 = $_POST["descripcion2"];
      $descripcion3 = $_POST["descripcion3"];
      $descripcion4 = $_POST["descripcion4"];
      $descripcion5 = $_POST["descripcion5"];
      $descripcion6 = $_POST["descripcion6"];
      $descripcion7 = $_POST["descripcion7"];
      $descripcion8 = $_POST["descripcion8"];
      $descripcion9 = $_POST["descripcion9"];
      $modo      = $_POST["modo"];
      $download  = $modo === 'si' ? true : false;
      $contenido = '<!DOCTYPE html>
      <html>
        <head>
          <style>
            table {
              width: 100%%;
              text-align: center;
            } 
          </style>
        </head>
        <body>
          <img src="https://i.ibb.co/W3WZBn2/Logo-Fliv-Industrias.png" style="width: 100px;"><br>
        
          <h1>%s</h1> 
          <p>Nombre de la pieza:<b>%s</b></p>
          <p>Molde de la pieza:<b>%s</b></p>
          <p>Medida total:<b>%s</b></p>
          <p>Proceso de la pieza:<b>%s</b></p>
          <p>Proceso de reciclaje:<b>%s</b></p>
          <p>Cantidad total:<b>%s</b></p>
          <p>Nombre del operario:<b>%s</b></p>
          <p>Nombre del supervisor:<b>%s</b></p>
          <p>Descripcion de la pieza:<b>%s</b></p>
          <p>Fecha de Ingreso:<b>%s</b></p>
      
          
          
        </body>
      </html>';
      $contenido = sprintf($contenido,$texto,$descripcion,$descripcion1,$descripcion2,$descripcion3,$descripcion4,$descripcion5,$descripcion6,$descripcion7,$descripcion8,$descripcion9);
      // Nombre del pdf
      $filename ='Informe de piezas.pdf';
   
      // Opciones para prevenir errores con carga de imágenes
      $options = new Options();
      $options->set('isRemoteEnabled', true);
 
      // Instancia de la clase
      $dompdf = new Dompdf($options);
 
      // Cargar el contenido HTML
      $dompdf->loadHtml($contenido);
 
      // Formato y tamaño del PDF
      $dompdf->setPaper('A4', 'portrait');
 
      // Renderizar HTML como PDF
      $dompdf->render();
 
      // Salida para descargar
      $dompdf->stream($filename, ['Attachment' => $download]);
 
    } catch (Exception $e) {
      var_dump($e->getMessage());
    } catch (DomException $e) {
      var_dump($e->getMessage());
    }
    
  }
}  


if(isset($_POST['action']) && $_POST['action']=="pdf"){
  $ic= new PdfPagina();
  $ic->post_crear_pdf();
}
?>