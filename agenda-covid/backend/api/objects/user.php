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

        if ($row != null) {
            $this->idUsuario = $row['idUsuario'];
            $this->nombre = $row['nombre'];
        }
    }

    // update the product
    function setPhoneNumber()
    {

        $query = "UPDATE
                " . $this->table_name . "
            SET
                telefono = :telefono
            WHERE
                idUsuario = :idUsuario";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));

        // bind new values
        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':telefono', $this->telefono);
        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // create product
}
