<?php
    require_once 'ConnectDB.php';

    class User extends Database {

        public function insert($name, $password, $email, $phone) {
            $query = "INSERT INTO users(name, password, email, phone)
            VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$name);
            $stmt->bindValue(2,$password);
            $stmt->bindValue(3,$email);
            $stmt->bindValue(4,$phone);

            $stmt->execute();

            return true;
        }

        public function getAll() {
            $query = "SELECT * FROM users ORDER BY id ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getById($id) {
            $query = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function updateById($name, $password, $email, $phone,$id) {
            $query = "UPDATE users SET name = ?, password = ?, email = ?, phone = ? WHERE id = ? ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$name);
            $stmt->bindValue(2,$password);
            $stmt->bindValue(3,$email);
            $stmt->bindValue(4,$phone);
            $stmt->bindValue(5,$id);

            $stmt->execute();

            return true;
        }

        public function deleteById($id) {
            $query = "DELETE FROM users WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);

            $stmt->execute();
            
            return true;
        }
    }
?>