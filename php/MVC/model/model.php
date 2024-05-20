<?php

require_once 'connection.php';

class Model extends Connection {
    public function getAllProjects() {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM projects1";
        $result = $conn->query($sql);

        $projects = [];
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }

        return $projects;
    }

    public function insertProject($title, $description) {
        $conn = $this->getConnection();
        $sql = "INSERT INTO projects1 (title, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $title, $description);
        $stmt->execute();

        $stmt->close();
    }
}
?>
