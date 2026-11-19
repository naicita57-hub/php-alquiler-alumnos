<?php
    spl_autoload_register('autoloadClases');

    function autoloadClases($nameClass){
        $fileClass = __DIR__ . "/../clases/$nameClass.php";
        if(file_exists($fileClass)){
            require_once($fileClass);
        }else{
            die("No se pudo cargar la clase: $nameClass");
        }
    };
?>