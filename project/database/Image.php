<?php
    require_once 'ConnectDB.php';

    class ImageDB extends Database {
        public function insert ($image_id, $product_code, $image1, $image2) {
            $query = "INSERT INTO images(image_id, product_code, image1, image2)
                VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$image_id);
            $stmt->bindValue(2,$product_code);
            $stmt->bindValue(3,$image1);
            $stmt->bindValue(4,$image2);

            $stmt->execute();
            
            return true;
        }

        public function getAll() {
            $query = "SELECT * FROM images ORDER BY image_id";
            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getById($image_id) {
            $query = "SELECT * FROM images WHERE image_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$image_id);

            $stmt->execute();
            return $stmt->fetch();
        }

        public function getbyProductCode($product_code) {
            $query = "SELECT * FROM images WHERE product_code = ?";
            $stmt= $this->conn->prepare($query);
            $stmt->bindValue(1,$product_code);

            $stmt->execute();
            return $stmt->fetch();
        }

        public function updateById($image_id, $product_code, $image1, $image2) {
            $query = "UPDATE images SET image_id = ?, product_code = ?, image1 = ?, image2 = ?
                        WHERE image_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$image_id);
            $stmt->bindValue(2,$product_code);
            $stmt->bindValue(3,$image1);
            $stmt->bindValue(4,$image2);
            $stmt->bindValue(5,$image_id);

            $stmt->execute();
            return true;
        }

        public function deleteById($id) {
            $query = "DELETE FROM images WHERE image_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);

            $stmt->execute();
            return true;
        }
    }
?>