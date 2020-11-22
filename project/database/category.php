<?php
    require_once 'ConnectDB.php';

    class Category extends Database {

        public function insert($category_id, $category_name,$category_description,$category_image) {
            $query = "INSERT INTO category(category_id, category_name, category_description, category_image)
                        VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$category_id);
            $stmt->bindValue(2,$category_name);
            $stmt->bindValue(3,$category_description);
            $stmt->bindValue(4,$category_image);

            $stmt->execute();

            return true;
        }

        public function getAll() {
            $query = "SELECT * FROM category ORDER BY category_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getById($id) {
          $query = "SELECT* FROM category WHERE category_id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindValue(1,$id);
          $stmt->execute();

          return $stmt->fetch();
        }

        public function updateById($category_id, $category_name, $category_description, $category_image,$id) {
            $query = "UPDATE category  
                        SET category_id = ?, category_name = ?, category_description = ?, category_image = ?
                        WHERE category_id = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$category_id);
            $stmt->bindValue(2,$category_name);
            $stmt->bindValue(3,$category_description);
            $stmt->bindValue(4,$category_image);
            $stmt->bindValue(5,$id);

            $stmt->execute();
            
            return true;
        }

        public function deletebyId($id) {
            $query = "DELETE FROM category WHERE category_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();
            return true;
        }
    }
