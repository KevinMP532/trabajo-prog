<?php
class countByAge
{

    private $conn;
    public $group1;
    public $group2;
    public $group3;
    public $group4;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    function countByAge()
    {
        $date18 = date('Y.m.d', strtotime("-18 years"));
        $date30 = date('Y.m.d', strtotime("-30 years"));
        $date50 = date('Y.m.d', strtotime("-50 years"));
        $date65 = date('Y.m.d', strtotime("-65 years"));
        for ($counter = 1; $counter < 4; $counter++) {

            switch ($counter) {
                case (1):

                    $query = "SELECT COUNT(fechaNacimiento) FROM usuario INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario WHERE fechaNacimiento BETWEEN '" . $date30 . "' AND '" . $date18 . "'";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row != null) {
                        $this->group1 = $row['COUNT(fechaNacimiento)'];
                    } else {
                        $this->group1 = "0";
                    }
                    break;
                case (2):

                    $query = "SELECT COUNT(fechaNacimiento) FROM usuario INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario WHERE fechaNacimiento BETWEEN '" . $date50 . "' AND '" . $date30 . "'";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row != null) {
                        $this->group2 = $row['COUNT(fechaNacimiento)'];
                    } else {
                        $this->group2 = "0";
                    }
                    break;
                case (3):

                    $query = "SELECT COUNT(fechaNacimiento) FROM usuario INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario WHERE fechaNacimiento BETWEEN '" . $date65 . "' AND '" . $date50 . "'";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row != null) {
                        $this->group3 = $row['COUNT(fechaNacimiento)'];
                    } else {
                        $this->group3 = "0";
                    }
                    break;
            }
        }
    }
}
