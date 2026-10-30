<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando a Base de datos</title>
</head>

<body>
    <?php
    /*Definiendo variables*/


    /*Definiendo constantes*/
    define("DB_SERVER", "localhost");
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "xdia";
    const DB_CHARSET = "utf8mb4";

    const DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    try {
        $conexion = new PDO(DSN, DB_USER, DB_PASS);

        var_dump($conexion);

        $query = "SELECT * FROM producto";
        $PDOStatement = $conexion->prepare($query);
        var_dump($PDOStatement);

        $PDOStatement->execute();
        var_dump($PDOStatement->execute());

        require_once("clases/Producto.php");

        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, "Producto");
        $datos = $PDOStatement->fetchAll();

        echo "<pre>";
        var_dump($datos);
        echo "</pre>";

        foreach($datos as $producto){
            echo "<p>". $producto->getId()."</p>";
        }

    } catch (Exception $jorge) {
        echo "<p>Fallo la conexión</p>";
        echo "<br>";
        die("<p> nose q paso </p>");

        echo $jorge->getMessage();
        echo "<br>";
        echo $jorge->getPrevious();
        echo "<br>";
        echo $jorge->getCode();
        echo "<br>";
        echo $jorge->getFile();
        echo "<br>";
        echo $jorge->getLine();
        echo "<br>";
        echo "<br>";
        echo $jorge->getTraceAsString();

        echo "<br>";
    }

    ?>
</body>

</html>