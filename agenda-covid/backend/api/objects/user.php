<?php
class User
{

    private $conn;
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
                usuario
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
                usuario
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

    function signUp()
    {

        $query = "INSERT
            INTO
                usuario
            SET
                idUsuario = :idUsuario,
                nombre = :nombre,
                apellido = :apellido,
                fechaNacimiento = :fechaNacimiento,
                telefono  = :telefono,
                idGrupo = :idGrupo,
                activo = :activo
            ";

        $stmt = $this->conn->prepare($query);
        $telefono = "";
        $state = 1;
        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':idGrupo', $this->idGrupo);
        $stmt->bindParam(':activo', $state);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
