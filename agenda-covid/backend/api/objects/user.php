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

    function singUp()
    {

        $query = "INSERT
            INTO
                " . $this->table_name . "(idUsuario, nombre, apellido, fechaNacimiento, telefono, idGrupo, activo)
            VALUES
                idUsuario = :idUsuario
                nombre = :nombre
                apellido = :apellido
                fechaNacimiento = :fechaNacimiento
                telefono  = :telefono
                idGrupo = :idGrupo
                activo = :activo
            ";

        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
        $stmt->bindParam(':telefono', "");
        $stmt->bindParam(':idGrupo', $this->idGrupo);
        $stmt->bindParam(':activo', 1);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
}
