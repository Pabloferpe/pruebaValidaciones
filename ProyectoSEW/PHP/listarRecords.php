<!DOCTYPE html>
<html lang="es">

<head>
    <!--Metadatos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <meta name="application-name" content="Powerlifting Asturias">
    <meta name="author" content="Pablo Fernández Peláez">
    <meta name="description" content="Aplicación sobre Powerlifting en Asturias">
    <meta name="keywords" content="Powerlifting, Asturias, competiciones, calendario, años">
    <title>Listar records</title>
    <link rel="stylesheet" type="text/css" href="../Estilo/estilo2.css" />

</head>

<body>
    <h1>Récords asturianos</h1>
    <main>

        <h3>Pulse el boton para listar todos los records</h3>

        <?php
        include("dataBase.php");
        $dataBase = new DataBase();
        $dataBase->crearTabla();

        if (count($_POST) > 0) {
            //$dataBase->borrarDatos();
            $dataBase->importarDatos();
            if (isset($_POST['listar'])) $dataBase->listarRecords();
            if (isset($_POST['filtrarCat'])) $dataBase->filtrarAtletasPorCategoria();
            if (isset($_POST['filtrarNom'])) $dataBase->filtrarAtletasPorNombre();
        }

        echo   "<form action='#' method='post' name='botones'>
                <input type = 'submit' class='button' name = 'listar' value = 'Listar records'/>

                <p>Introduce una categoria para filtrar los atletas<p>  <input type='text' name='categoria'>
                <input type = 'submit' class='button' name = 'filtrarCat' value = 'Filtrar por categoría'/>

                <p>Introduce un nombre para filtrar los atletas<p>  <input type='text' name='nombre'>
                <input type = 'submit' class='button' name = 'filtrarNom' value = 'Filtrar por nombre'/>
            </form>"

        ?>
    </main>
    <address>
        <p>Autor: Pablo Fernández Peláez</p>
    </address>

    <a href="https://validator.w3.org/check?uri=referer"><img src="https://www.w3.org/html/logo/badge/html5-badge-h-solo.png" alt="Validador HTML5" title="HTML5 Válido" height="64" width="63" />
    </a>

    <a href=" http://jigsaw.w3.org/css-validator/check/referer ">
        <img src=" http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" height="31" width="88" />
    </a>
    </footer>

</body>

</html>