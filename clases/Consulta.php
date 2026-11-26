<?php
class Consulta
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $id_producto;
    private $id_motivo;
    private $comentario;
    private $fecha_creacion;
    public $nombre_producto;
    public $nombre_motivo;

    //GETTERS

    /**
     * Obtiene el id de Consulta
     */
    public function getIdConsulta(): int
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre de Consulta
     */
    public function getNombreConsulta(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene el apellido de Consulta
     */
    public function getApellidoConsulta(): string
    {
        return $this->apellido;
    }

    /**
     * Obtiene el email de Consulta
     */
    public function getEmailConsulta(): string
    {
        return $this->email;
    }

    /**
     * Obtiene el telefono de Consulta
     */
    public function getTelefonoConsulta(): string
    {
        return $this->telefono;
    }

    /**
     * Obtiene el id_producto de Consulta
     */
    public function getIdPConsulta(): ?int
    {
        return $this->id_producto !== null ? (int) $this->id_producto : null;
    }

    /**
     * Obtiene el motivo de Consulta
     */
    public function getIdMotivoConsulta(): int
    {
        return $this->id_motivo;
    }

    /**
     * Obtiene el comentario de Consulta
     */
    public function getComentarioConsulta(): string
    {
        return $this->comentario;
    }

    /**
     * Obtiene el fecha de creación de Consulta
     */
    public function getCreacionConsulta(): string
    {
        return $this->fecha_creacion;
    }

    //SETTERS

    /**
     * Setea el id de Consulta
     * @param int $dato id de la consulta
     */
    public function setIdConsulta(int $dato)
    {
        $this->id = $dato;
    }

    /**
     * Setea el nombre de Consulta
     * @param string $dato nombre de la consulta
     */
    public function setNombreConsulta(string $dato)
    {
        $this->nombre = $dato;
    }

    /**
     * Setea el apellido de Consulta
     * @param string $dato apellido de la consulta
     */
    public function setApellidoConsulta(string $dato)
    {
        $this->apellido = $dato;
    }

    /**
     * Setea el email de Consulta
     * @param string $dato email de la consulta
     */
    public function setEmailConsulta(string $dato)
    {
        $this->email = $dato;
    }

    /**
     * Setea el telefono de Consulta
     * @param string $dato telefono de la consulta
     */
    public function setTelefonoConsulta(string $dato)
    {
        $this->telefono = $dato;
    }

    /**
     * Setea el id_producto de Consulta
     * @param int $dato id_producto de la consulta
     */
    public function setIdPConsulta(int $dato)
    {
        $this->id_producto = $dato;
    }

    /**
     * Setea el motivo de Consulta
     * @param int $dato motivo de la consulta
     */
    public function setIdMotivoConsulta(int $dato)
    {
        $this->id_motivo = $dato;
    }

    /**
     * Setea el comentario de Consulta
     * @param string $dato comentario de la consulta
     */
    public function setComentarioConsulta(string $dato)
    {
        $this->comentario = $dato;
    }

    /**
     * Setea el fecha de creación de Consulta
     * @param string $dato fecha de creación de la consulta
     */
    public function setCreacionConsulta(string $dato)
    {
        $this->fecha_creacion = $dato;
    }

    public static function todasConsultas(): array
    {

        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                c.id,
                c.nombre,
                c.apellido,
                c.email,
                c.telefono,
                c.id_producto,
                c.id_motivo,
                m.nombre AS nombre_motivo,
                c.comentario,
                c.fecha_creacion,
                p.nombre as nombre_producto
              FROM consultas AS c
              LEFT JOIN producto AS p ON c.id_producto = p.id
              LEFT JOIN motivo AS m ON c.id_motivo = m.id
              ORDER BY c.fecha_creacion DESC";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    public static function insert(
        string $nombre,
        string $apellido,
        string $email,
        string $telefono,
        ?int $id_producto,
        int $id_motivo,
        string $comentario
    ): void {
        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO consultas (nombre, apellido, email, telefono, id_producto, id_motivo, comentario)
              VALUES (:nombre, :apellido, :email, :telefono, :id_producto, :id_motivo, :comentario)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre'      => $nombre,
            'apellido'    => $apellido,
            'email'       => $email,
            'telefono'    => $telefono,
            'id_producto' => $id_producto,
            'id_motivo'   => $id_motivo,
            'comentario'  => $comentario
        ]);
    }
    public static function get_x_id(int $id): ?Consulta
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT
                    c.id,
                    c.nombre,
                    c.apellido,
                    c.email,
                    c.telefono,
                    c.id_producto,
                    c.id_motivo,
                    m.nombre AS nombre_motivo,
                    c.comentario,
                    c.fecha_creacion,
                    p.nombre as nombre_producto
                  FROM consultas AS c
                  LEFT JOIN producto AS p ON c.id_producto = p.id
                  LEFT JOIN motivo AS m ON c.id_motivo = m.id
                  WHERE c.id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['id' => $id]);

        return $PDOStatement->fetch() ?: null;
    }

    public function update(
        string $nombre,
        string $apellido,
        string $email,
        string $telefono,
        ?int $id_producto,
        int $id_motivo,
        string $comentario
    ): void {
        $conexion = (new Conexion())->getDB();
        $query = "UPDATE consultas
                  SET nombre = :nombre,
                      apellido = :apellido,
                      email = :email,
                      telefono = :telefono,
                      id_producto = :id_producto,
                      id_motivo = :id_motivo,
                      comentario = :comentario
                  WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id'          => $this->id,
            'nombre'      => $nombre,
            'apellido'    => $apellido,
            'email'       => $email,
            'telefono'    => $telefono,
            'id_producto' => $id_producto,
            'id_motivo'   => $id_motivo,
            'comentario'  => $comentario,
        ]);
    }

    public function delete(): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM consultas WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['id' => $this->id]);
    }
}
