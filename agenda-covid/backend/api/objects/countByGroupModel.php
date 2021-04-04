<?php
class countByGroup
{

    private $conn;

    public $group1Count;
    public $group2Count;
    public $group3Count;
    public $group4Count;
    public $group5Count;
    public $group6Count;
    public $group7Count;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function countByGroup()
    {
        for ($counter = 0; $counter < 8; $counter++) {

            $query = "SELECT COUNT(idGrupo)
            FROM
                usuario
            WHERE
                idGrupo = " . $counter;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            switch ($counter) {
                case (1):
                    if ($row != null) {
                        $this->group1Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group1Count = "0";
                    }
                    break;
                case (2):
                    if ($row != null) {
                        $this->group2Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group2Count = "0";
                    }
                    break;
                case (3):
                    if ($row != null) {
                        $this->group3Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group3Count = "0";
                    }
                    break;
                case (4):
                    if ($row != null) {
                        $this->group4Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group4Count = "0";
                    }
                    break;
                case (5):
                    if ($row != null) {
                        $this->group5Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group5Count = "0";
                    }
                    break;
                case (6):
                    if ($row != null) {
                        $this->group6Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group6Count = "0";
                    }
                    break;
                case (7):
                    if ($row != null) {
                        $this->group7Count = $row['COUNT(idGrupo)'];
                    } else {
                        $this->group7Count = "0";
                    }
                    break;
            }
        }
    }
}
