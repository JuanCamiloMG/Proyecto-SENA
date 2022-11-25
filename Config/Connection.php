<?php
//Etiqueta PHP Abrimos

//En la programacion orientada a objetos utilizaremos clases//
//Las clases tiene metodos,parametros y propiedades//
//Las propiedades pueden ser Publicas,privadas y protegidas//
//Esta clase es para la conexion a la base de datos//
//Nos permitira administrar las conexiones a la base de datos//
// El nombre que le damos a la clase es referente al archivo creado para trabajar de una manera mas ordenada//
class Connection{
    //Trabajamos con la propiedad database,la cual me permite hacer la conexion a la base de datos del proyecto//
    public $database;
    //Trabajaremos con el metodo magico constructor que se trabaja en programacion orientada a objetos//
    //Son metodos que se ejecutan al instanciar la clase, es decir ejecuta el codigo que tengamos dentro de los corchetes//
    public function __construct(){
        //La estructura de control Try catch se utiliza cuando el trata de hacer el intento de ejecutar el codigo//
        //En caso de error el Try catch capturara y mostrara el error//
        try {
         //Para hacer la conexion, se trabaja con una libreria de PHP que se llama PDO//
         //PDO nos permite conectarnos cualquier motor de base de datos//
         //Trabajamos con la palabra reservada this, la cual nos permite acceder a una propiedad de esta clase//
         //La propiedad es database y despues utilizamos la palabra reservada new para crear una instancia, que es darle unas propiedades y parametros//
         //El parametro es trabajar con mysql para la creacion de la base de datos del proyecto y el servidor local (Localhost)//
         $this->database = new PDO("mysql:host=localhost; 
         dbname=flyindustrias",'root','');
         //En el caso que la conexion falle, el mostrara el error que esta generando la libreria de PDO// 
         //El error se guardara en una variable error//
         //Se enviara en un echo el error, que es como un llamado del error//
         //Concatemos el error que arroja por medio de un metodo getMessage, que es un mensaje de error//
        } catch (PDOException $error) {
            echo "Error de base de datos"  . $error->getMessage();
        }
    } 
}

//Etiqueta PHP Cerramos
?>