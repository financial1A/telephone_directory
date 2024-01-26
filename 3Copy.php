<?php
class Database {
    private $host = '127.0.0.1:3000';
    private $db_name = 'financia_mileage';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

class Suggestion {
    private $conn;
    private $table = 'tablename';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getSuggestions($searchTerm) {
        $stmt = $this->conn->prepare('SELECT ID1,name,ext,mobile,dept,location FROM ' . $this->table . ' WHERE name LIKE ? OR dept LIKE ? LIMIT 100');
        $likeTerm = "%$searchTerm%";
        $stmt->bind_param('ss', $likeTerm,$likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

header('Content-Type: application/json');

$database = new Database();
$db = $database->connect();

$suggestion = new Suggestion($db);
$suggestions = $suggestion->getSuggestions($_GET['q']);

echo json_encode($suggestions);
?>
