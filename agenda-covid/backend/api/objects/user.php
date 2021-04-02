<?php
class User
{

    private $conn;
    private $table_name = "usuario";

    public $idUsuario;
    public $nombre;
    public $fechaNacimiento;
    public $telefono;
    public $idGrupo;
    public $activo;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function login()
    {

        $query = "SELECT
                 *
            FROM
                " . $this->table_name . " 
            WHERE
                idUsuario = ?
            ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->idUsuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->idUsuario = $row['idUsuario'];
        $this->nombre = $row['nombre'];
    }
}
