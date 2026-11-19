<?php
class Carrera
{
    private $id;
    private $nombre;

    public function getIdCarrera()
    {
        return $this->id;
    }

    public function getNombreCarrera()
    {
        return $this->nombre;
    }

    /**
     * 
     * Obtiene todas las carrera de la base de datos
     */
    public function todasCarreras(): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT * FROM carreras";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Inserta una nueva carrera en la base de datos
     */
    public static function insert(string $nombre)
    {
        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO carreras (`nombre`) VALUES (:nombre)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre
        ]);
    }

    /**
     * Obtiene una carrera por id
     */
    public static function get_x_id(int $id): ?Carrera
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT id, nombre FROM carreras WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);

        $lista = $PDOStatement->fetch();

        return !empty($lista) ? $lista : null;
    }

    /**
     * Edita una instancia de carrera
     * @param mixed $nombre Nombre de la carrera
     */
    public function edit($nombre)
    {
        $conexion = (new Conexion())->getDB();
        $query = "UPDATE carreras SET nombre = :nombre
          WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre"   => $nombre,
            "id"            => $this->id
        ]);
    }

    /**
     * Borra una instancia de carrera
     */
    public function delete()
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM carreras WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id"            => $this->id
        ]);
    }
}
