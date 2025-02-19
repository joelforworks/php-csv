<?php
namespace App\entities;
class Nave {
    private $id;
    private $name;
    private $model;
    private $manufacturer;
    private $cost_in_credits;
    private $length;
    private $max_atmosphering_speed;
    private $crew;
    private $passengers;
    private $cargo_capacity;
    private $consumables;
    private $hyperdrive_rating;
    private $MGLT;
    private $starship_class;
    private $created;
    private $edited;
    private $url;

    private $db;

    public function __construct() {
        try {
            $this->db = new \SQLite3(__DIR__ . "/../database.sqlite");
        } catch (\Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }


    public function deleteById($id) {
        $query = "DELETE FROM naves WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        return $stmt->execute();
    }
    public function getById($id) {
        $query = "SELECT * FROM naves WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $result = $stmt->execute();

        $data = $result->fetchArray(SQLITE3_ASSOC);

        return $data ? $data : null;
    }

    // Method to get all registers
    public function getAll() {
        $query = "SELECT * FROM naves";
        $result = $this->db->query($query);
        $naves = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $naves[] = $row;
        }

        return $naves;
    }

}
?>
