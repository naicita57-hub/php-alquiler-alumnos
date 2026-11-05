<?php
class Conexion
{
    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "xdia";
    private const DB_CHARSET = "utf8mb4";

    private const DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . "; charset=" . self::DB_CHARSET;

    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die("<p>Falló la conexión</p>");
        }
    }

    public function getDB()
    {
        return $this->db;
    }
}
