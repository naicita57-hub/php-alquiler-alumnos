<?php
class Conexion
{
    private const DB_SERVER  = "127.0.0.1"; // O "localhost"
    private const DB_PORT    = "8889";       // Puerto por defecto de MySQL en MAMP para Mac
    private const DB_USER    = "root";
    private const DB_PASS    = "root";       // En MAMP la clave predeterminada es "root"
    private const DB_NAME    = "xdia";
    private const DB_CHARSET = "utf8mb4";

    private const DSN = "mysql:host=" . self::DB_SERVER . ";port=" . self::DB_PORT . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;
    
    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            // Muestra el mensaje exacto si vuelve a ocurrir un error
            die("<p>Falló la conexión: " . $e->getMessage() . "</p>");
        }
    }

    public function getDB()
    {
        return $this->db;
    }
}