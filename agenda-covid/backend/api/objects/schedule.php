<?php
class Schedule
{

    private $conn;

    public $idUsuario;
    public $fechaV1;
    public $fechaV2;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function schedule()
    {

        // query to insert record
        $query = "INSERT INTO agenda
                
            SET
                idUsuario=:idUsuario, fechaV1=:fechaV1, fechaV2=:fechaV2";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":idUsuario", $this->idUsuario);
        $stmt->bindParam(":fechaV1", $this->fechaV1);
        $stmt->bindParam(":fechaV2", $this->fechaV2);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
