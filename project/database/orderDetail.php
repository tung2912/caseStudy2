<?php
    require_once 'ConnectDB.php';

    class OrderDetail extends Database {

        public function insert($orderNumber, $product_code, $buy_quantity, $priceEach)
        {
            $query = "INSERT INTO orderdetails(orderNumber, product_code, buy_quantity, priceEach)
                VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$orderNumber);
            $stmt->bindValue(2,$product_code);
            $stmt->bindValue(3,$buy_quantity);
            $stmt->bindValue(4,$priceEach);

            $stmt->execute();

            return true;
        }

        public function getAll(){
            $query = "SELECT * FROM orderdetails";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getById($orderNumber, $product_code) {
            $query = "SELECT * FROM orderdetails WHERE orderNumber = ? AND product_code = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$orderNumber);
            $stmt->bindValue(2,$product_code);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function getByOrderNumber($orderNumber) {
            $query = "SELECT products.product_code, products.product_name, orderdetails.priceEach,
             images.image1,orderdetails.buy_quantity
            , (orderdetails.priceEach*orderdetails.buy_quantity) as Total
            FROM products INNER JOIN orderdetails ON products.product_code = orderdetails.product_code 
            INNER JOIN images ON images.product_code = products.product_code
             WHERE orderdetails.orderNumber = ?";

             $stmt = $this->conn->prepare($query);
             $stmt->bindValue(1, $orderNumber);
             $stmt->execute();

             return $stmt->fetchAll();
        }

        public function updateById($id, $orderNumber, $product_code, $buy_quantity, $priceEach) {
            $query = "UPDATE orderdetails SET orderNumber = ?, product_code = ?, buy_quantity = ?, priceEach = ?
                        WHERE orderNumber = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$orderNumber);
            $stmt->bindValue(2,$product_code);
            $stmt->bindValue(3,$buy_quantity);
            $stmt->bindValue(4,$priceEach);
            $stmt->bindValue(5,$id);

            $stmt->execute();
            return true;
        }

        public function updateItemInDetail($orderNumber, $old_product_code,$new_product_code ,$new_buy_quantity, $new_priceEach) {
            $query = "UPDATE orderdetails SET product_code = ?, buy_quantity = ?, priceEach = ?
                        WHERE orderNumber = ? AND product_code = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$new_product_code);
            $stmt->bindValue(2,$new_buy_quantity);
            $stmt->bindValue(3,$new_priceEach);
            $stmt->bindValue(4,$orderNumber);
            $stmt->bindValue(5,$old_product_code);

            $stmt->execute();

            return true;
        }

        public function deleteByProductCode($product_code) {
            $query = "DELETE FROM orderdetails WHERE product_code = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1,$product_code);

            $stmt->execute();

            return true;
        }
    }
?>