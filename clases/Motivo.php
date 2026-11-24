<?php
class Motivo
{
    private $id;
    private $nombre;
    
    // GETTERS //

    /**
     * Obtiene la id de Motivo
     */
    public function getIdMotivo(): int
    {
        return $this->id;
    }

    /**
     * Obtiene la id de Motivo
     */
    public function getNombreMotivo(): string
    {
        return $this->nombre;
    }

    //SETTERS

    /**
     * Setea el id de Motivo
     * @param int $dato id del motivo
     */
    public function setIdMotivo(int $dato)
    {
        $this->id = $dato;
    }

    /**
     * Setea el nombre de Motivo
     * @param string $dato nombre del motivo
     */
    public function setNombreMotivo(string $dato)
    {
        $this->nombre = $dato;
    }

    public static function todosMotivos(): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT id, nombre FROM motivo ORDER BY nombre ASC";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    public static function get_x_id(int $id): ?Motivo
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT id, nombre FROM motivo WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['id' => $id]);

        return $PDOStatement->fetch() ?: null;
    }
}