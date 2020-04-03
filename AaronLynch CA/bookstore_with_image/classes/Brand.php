<?php
require_once 'classes/Connection.php';

class Brand {
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $website;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO brands(
                        name, address, phone, email, website
                    ) VALUES (
                        :name, :address, :phone, :email, :website
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE brands SET
                        name = :name,
                        address = :address,
                        phone = :phone,
                        email = :email,
                        website = :website
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save brand");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving brand");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('brands');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved brand cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM brands WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete brand");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting brand");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM brands';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve brands");
        }
        else {
            $brands = $stmt->fetchAll(PDO::FETCH_CLASS, 'brand');
            return $brands;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM brands WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve brand");
        }
        else {
            $brand = $stmt->fetchObject('brand');
            return $brand;
        }
    }
}
?>
