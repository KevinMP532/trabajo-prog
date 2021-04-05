<?php
header("Access-Control-Allow-Origin: *");
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

        if ($row != null) {
            $this->idUsuario = $row['idUsuario'];
            $this->nombre = $row['nombre'];
        }
    }

    function setPhoneNumber()
    {
        $query = "UPDATE
                " . $this->table_name . "
            SET
                telefono = :telefono
            WHERE
                idUsuario = :idUsuario";

        $stmt = $this->conn->prepare($query);

        $this->telefono = htmlspecialchars(strip_tags($this->telefono));

        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':telefono', $this->telefono);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
