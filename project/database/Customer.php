<?php
    require_once 'ConnectDB.php';

    class Customer extends Database {
        public function insert($customer_name, $customer_address, $customer_phone, $customer_email) {
            $query = "INSERT INTO 
                    customers(customer_name, customer_address, customer_phone, customer_email)
                    VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$customer_name);
            $stmt->bindValue(2,$customer_address);
            $stmt->bindValue(3,$customer_phone);
            $stmt->bindValue(4,$customer_email);

            $stmt->execute();

            return true;
        }
        public function getLastInsert()
        {
            return $this->conn->lastInsertId();
        }

        public function getAll() {
            $query = " SELECT * FROM customers ORDER BY customer_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }
        public function getById($id) {
            $query = "SELECT *FROM customers 
                        WHERE customer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function updateById($customer_name, $customer_address, $customer_phone, $customer_email, $id) {
            $query = "UPDATE customers
                      SET customer_name = ?, customer_address = ?, customer_phone = ?, customer_email = ?  
                      WHERE customer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$customer_name);
            $stmt->bindValue(2,$customer_address);
            $stmt->bindValue(3,$customer_phone);
            $stmt->bindValue(4,$customer_email);
            $stmt->bindValue(5,$id); 
            
            $stmt->execute();

            return true;
        }

        public function deleteById($id) {
            $query = "DELETE FROM customers WHERE customer_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$id);

            $stmt->execute();

            return true;
        }
    }
?>