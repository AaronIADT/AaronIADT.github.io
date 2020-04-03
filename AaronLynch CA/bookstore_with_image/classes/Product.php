<?php
require_once 'classes/Connection.php';

class Product {
    public $id;
    public $title;
    public $description;
    public $serial;
    public $rating;
    public $price;
    public $picture;
    public $brand_id;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'title' => $this->title,
            'description' => $this->description,
            'serial' => $this->serial,
            'rating' => $this->rating,
            'price' => $this->price,
            'picture' => $this->picture,
            'brand_id' => $this->brand_id
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO products(
                        title, description, serial, rating, price, picture, brand_id
                    ) VALUES (
                        :title, :description, :serial, :rating, :price, :picture, :brand_id
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE products SET
                        title = :title,
                        description = :description,
                        serial = :serial,
                        rating = :rating,
                        price = :price,
                        picture = :picture,
                        brand_id = :brand_id
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save product");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving product");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('products');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved product cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM products WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete product");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting product");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM products';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve products");
        }
        else {
            $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'product');
            return $products;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM products WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve product");
        }
        else {
            $product = $stmt->fetchObject('product');
            return $product;
        }
    }
}
?>
