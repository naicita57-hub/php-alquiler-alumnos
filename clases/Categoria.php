<?php
class Categoria
{
    private $id;	
    private $nombre;
    private $imagen;	

    public function getId()
    {
        return $this->id;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * 
     * Obtiene todas las marcar de la base de datos
     */
    public static function todasCategorias():array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT * FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }
    /**
     * Inserta una nueva marca en la base de datos
    */
    public static function insert(string $nombre)
    {
        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO categorias (`nombre`) VALUES (:nombre)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre
        ]);
    }



    /**
     * Obtiene una marca por id
     * 
    */
    public static function get_x_id(int $id): ?Categoria
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT * FROM categorias WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);

        $resultado = $PDOStatement->fetch();

        return !empty($resultado) ? $resultado : null;
    }
    /**
     * Edita una instancia de marca
     */
    public function edit($nombre)
    {
        $conexion = (new Conexion())->getDB();
        $query = "UPDATE categorias SET nombre = :nombre
          WHERE id = :id";
        // print_r($this->id_marca);
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
                        "nombre"   => $nombre, 
                        "id"            => $this->id
                        // "id"            => $id
                    ]);
    }

    /**
     * Borra una instancia de marca
     */
    public function delete()
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM categorias WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
                        "id"            => $this->id
                    ]);
    }
}

?>