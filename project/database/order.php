<?php 
    require_once 'ConnectDB.php';

    class Order extends Database {

        public function insert($customer_id) 
        {
            $query = "INSERT INTO orders(customer_id) VALUES (?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$customer_id);

            $stmt->execute();

            return true;
        }

        public function getLastInsert()
        {
            return $this->conn->lastInsertId();
        }

        public function getAll(){
            $query = "SELECT * FROM orders ORDER BY orderNumber";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getByStatus($status) {
            $query = "SELECT * FROM orders WHERE status = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$status);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getById($id){
            $query = "SELECT * FROM orders WHERE orderNumber = ? ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function getbyCustomerId($id) {
            $query = "SELECT * FROM orders WHERE customer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function updateById($id, $orderDate, $status) {
            $query = "UPDATE orders
                        SET orderDate = ?, status = ? 
                        WHERE orderNumber = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$orderDate);
            $stmt->bindValue(2,$status);
            $stmt->bindValue(3,$id);

            $stmt->execute();

            return true;
        }

        public function updateStatusById($oldStatus, $newStatus,$id) {
            $query = "UPDATE orders
                        SET status = ? 
                        WHERE orderNumber = ? && status = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$newStatus);
            $stmt->bindValue(2,$id);
            $stmt->bindValue(3,$oldStatus);

            $stmt->execute();

            return true;
        }

        public function deleteById($id) {
            $query = "DELETE FROM orders WHERE orderNumber = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();
            return true;
        }
    }
?>