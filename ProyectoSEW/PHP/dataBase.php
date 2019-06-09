<?php
class DataBase{

public function crearBaseDatos(){
    //datos de la base de datos
    $servername = "localhost";
    $username = "DBUSER2018";
    $password = "DBPSWD2018";

    // Conexión al SGBD local con XAMPP con el usuario creado
    $db = new mysqli($servername,$username,$password);

    //comprobamos conexión
    if($db->connect_error) {
        exit ("<p>ERROR de conexión:".$db->connect_error."</p>");
    } else {echo "<p>Conexión establecida.</p>";}



    $cadenaSQL = "CREATE DATABASE IF NOT EXISTS BaseDatos COLLATE utf8_spanish_ci";
    if($db->query($cadenaSQL) === TRUE){
        echo "<p>Base de datos BaseDatos creada con éxito</p>";
    } else {
        echo "<p>ERROR en la creación de la Base de Datos BaseDatos</p>";
        exit();
    }
//cerrar la conexión
$db->close();
}

public function crearTabla(){
    $this->borrarDatos();

            //datos de la base de datos
            $servername = "localhost";
            $username = "DBUSER2018";
            $password = "DBPSWD2018";
            $database = "BaseDatos";

            $db = new mysqli($servername,$username,$password);

            $db->select_db($database);

            $crearTabla = "CREATE TABLE IF NOT EXISTS ATLETA (
                            id INT NOT NULL AUTO_INCREMENT,
                            nombre VARCHAR(50) NOT NULL,
                            apellido VARCHAR(50) NOT NULL,
                            edad INT NOT NULL,
                            procedencia VARCHAR(50) NOT NULL,
                            categoria VARCHAR(50) NOT NULL,
                            PRIMARY KEY (id))
                      ";
            $crearTabla2 = "CREATE TABLE IF NOT EXISTS RECORD (
                        id INT NOT NULL AUTO_INCREMENT,
                        nombreCompeticion VARCHAR(50) NOT NULL,
                        localizacion VARCHAR(50) NOT NULL,
                        fecha VARCHAR(50) NOT NULL,
                        movimiento VARCHAR(50) NOT NULL,
                        marcaObtenida INT NOT NULL,
                        idAtleta INT NOT NULL,
                        PRIMARY KEY (id),
                        FOREIGN KEY(idAtleta) REFERENCES atleta(id))
                        ";



            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 1 creada con éxito </p>";
             } else {
                echo "<p>ERROR en la creación de la tabla  1</p>";
                exit();
             }
             if($db->query($crearTabla2) === TRUE){
                echo "<p>Tabla 2 creada con éxito </p>";
             } else {
                echo "<p>ERROR en la creación de la tabla 2 </p>";
                exit();
             }

        //cerrar la conexión
        $db->close();
}

public function filtrarAtletasPorNombre(){
      //datos de la base de datos
      $servername = "localhost";
      $username = "DBUSER2018";
      $password = "DBPSWD2018";
      $database = "BaseDatos";

      // Conexión al SGBD local con XAMPP con el usuario creado
      $db = new mysqli($servername,$username,$password,$database);

      // compruebo la conexion
      if($db->connect_error) {
          exit ("<p>ERROR de conexión:".$db->connect_error."</p>");
      }

       $consultaPre = $db->prepare("SELECT * FROM Atleta WHERE nombre = ?");
       $consultaPre->bind_param('s', $_POST["nombre"]);
       $consultaPre->execute();
       $resultado = $consultaPre->get_result();

       if ($resultado) {
           while($row = $resultado->fetch_assoc()) {

               echo "<p>Atleta: ";
               echo "Nombre:" . $_POST["nombre"] . " ,Apellido: ".$row['apellido']." ,Edad: ". $row['edad']
               ." ,Procedencia: ". $row['procedencia']." ,Categoría: ". $row['categoria']
                ."</p>";
           }
       } else {
           echo "<p>Sin resultados</p>";
       }

       // cierro la consulta y la base de datos
       $consultaPre->close();
       $db->close();

}

public function filtrarAtletasPorCategoria(){
      //datos de la base de datos
      $servername = "localhost";
      $username = "DBUSER2018";
      $password = "DBPSWD2018";
      $database = "BaseDatos";

      // Conexión al SGBD local con XAMPP con el usuario creado
      $db = new mysqli($servername,$username,$password,$database);

      // compruebo la conexion
      if($db->connect_error) {
          exit ("<p>ERROR de conexión:".$db->connect_error."</p>");
      }

       $consultaPre = $db->prepare("SELECT * FROM Atleta WHERE categoria = ?");
       $consultaPre->bind_param('s', $_POST["categoria"]);
       $consultaPre->execute();
       $resultado = $consultaPre->get_result();

       if ($resultado) {
           while($row = $resultado->fetch_assoc()) {
               echo "<p>Atleta: ";
               echo "Nombre:" .$row['nombre']. " ,Apellido: ".$row['apellido']." ,Edad: ". $row['edad']
               ." ,Procedencia: ". $row['procedencia']." ,Categoría: ". $_POST["categoria"]
                ."</p>";
           }
       } else {
           echo "<p>Sin resultados</p>";
       }

       // cierro la consulta y la base de datos
       $consultaPre->close();
       $db->close();

}


public function listarRecords(){
  //datos de la base de datos
  $servername = "localhost";
  $username = "DBUSER2018";
  $password = "DBPSWD2018";
  $database = "BaseDatos";

  // Conexión al SGBD local con XAMPP con el usuario creado
  $db = new mysqli($servername,$username,$password,$database);

  // compruebo la conexion
  if($db->connect_error) {
      exit ("<p>ERROR de conexión:".$db->connect_error."</p>");
  }


  $resLista = $db->query('SELECT * FROM Atleta');

    while($row = $resLista->fetch_assoc()) {
        echo "<h2>".$row['nombre']." ".$row['apellido']."</h2>";
        echo "<p> Edad: ".$row['edad']."<p>";
        echo "<p> Procedencia: ".$row['procedencia']."<p>";
        echo "<p> Categoría: ".$row['categoria']."<p>";

        $resRecord = $db->query('SELECT * FROM Record where idAtleta = '.$row['id']);
            while($row = $resRecord->fetch_assoc()) {
                echo "<p> Nombre de la competición: ".$row['nombreCompeticion']."<p>";
                echo "<p> Localización: ".$row['localizacion']."<p>";
                echo "<p> Fecha: ".$row['fecha']."<p>";
                echo "<p> Movimiento: ".$row['movimiento']."<p>";
                echo "<p> Marca obtenida: ".$row['marcaObtenida']."<p>";
            }
     }

//cerrar la conexión
$db->close();

}


public function importarDatos(){
    $servername = "localhost";
    $username = "DBUSER2018";
    $password = "DBPSWD2018";
    $database = "BaseDatos";

    // Conexión al SGBD local con XAMPP con el usuario creado
    $db = new mysqli($servername,$username,$password,$database);
    if($db->connect_error) {
        exit ("<p>ERROR de conexión:".$db->connect_error."</p>");
    } else {echo "<p>Conexión establecida.</p>";}

    $csv = array_map(function($v){return str_getcsv($v, ";");}, file('Atletas.csv'));
    for($i=1;$i<count($csv);$i=$i+1){
        $consultaPre = $db->prepare("INSERT INTO Atleta (nombre, apellido, edad, procedencia, categoria)
        VALUES (?,?,?,?,?)");
      $consultaPre->bind_param('ssiss',
      $csv[$i][0] ,$csv[$i][1], $csv[$i][2] ,$csv[$i][3],$csv[$i][4]);
       $consultaPre->execute();
    }
    echo "<p>Filas agregadas </p>";
    $consultaPre->close();


    $csv = array_map(function($v){return str_getcsv($v, ";");}, file('Records.csv'));
    for($i=1;$i<count($csv);$i=$i+1){
        $consultaPre = $db->prepare("INSERT INTO record (nombreCompeticion, localizacion, fecha, movimiento, marcaObtenida, idAtleta)
        VALUES (?,?,?,?,?,?)");
      $consultaPre->bind_param('ssssii',
      $csv[$i][0],$csv[$i][1],$csv[$i][2],$csv[$i][3],$csv[$i][4],$csv[$i][5]);
       $consultaPre->execute();

    }
    $consultaPre->close();
    $db->close();

}


public function borrarDatos(){
    //datos de la base de datos
    $servername = "localhost";
    $username = "DBUSER2018";
    $password = "DBPSWD2018";
    $database = "BaseDatos";

    // Conexión al SGBD local con XAMPP con el usuario creado 
    $db = new mysqli($servername,$username,$password,$database);

    // compruebo la conexion
    if($db->connect_error) {
        exit ("<p>ERROR de conexión:".$db->connect_error."</p>");  
    } 

    $consultaPre = $db->prepare("DROP TABLE record");       
    $consultaPre->execute();

     $consultaPre2 = $db->prepare("DROP TABLE atleta");       
     $consultaPre2->execute();

     

     $consultaPre->close();
     $db->close();
   
}

}
