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

    function scheduleCheck()
    {

        $query = "SELECT
                 agenda.idUsuario
            FROM
                agenda
            WHERE
                idUsuario = ?
            ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->idUsuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row != null) {
            $this->idUsuario = $row['idUsuario'];
        }else{
            $this->idUsuario = "not found";
        }
    }
}
