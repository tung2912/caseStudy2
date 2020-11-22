<?php
    require_once 'ConnectDB.php';

    class ProductDB extends Database 
    {
        public function insert($product_code, $product_name, $category_id, $instock_quantity, $price) {
            $query = "INSERT INTO products(product_code, product_name, category_id, instock_quantity, price ) 
                VALUES(?,?,?,?,?)";

                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(1,$product_code);
                $stmt->bindValue(2,$product_name);
                $stmt->bindValue(3,$category_id);
                $stmt->bindValue(4,$instock_quantity);
                $stmt->bindValue(5,$price);

                $stmt->execute();

                return true;
        }
        
        public function getAll() {
            $query = "SELECT * FROM products ORDER by product_code";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getByName($productName) {
          $query = "SELECT * FROM products 
          INNER JOIN images ON images.product_code = products.product_code
          WHERE products.product_name LIKE '%$productName%'";
          $stmt = $this->conn->prepare($query);

          $stmt->execute();
          return $stmt->fetchAll();
        }

        public function getAllByCategory($category_id) {
          $query = "SELECT * 
            FROM products INNER JOIN category 
              ON products.category_id = category.category_id INNER JOIN images 
                ON images.product_code = products.product_code 
                    WHERE products.category_id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindValue(1, $category_id);
          $stmt->execute();

          return $stmt->fetchAll();
      }

      public function getAllByCategoryLimit($category_id) {
        $query = "SELECT * 
        FROM products INNER JOIN category 
          ON products.category_id = category.category_id INNER JOIN images 
            ON images.product_code = products.product_code 
                WHERE products.category_id = ? LIMIT 4";
      $stmt = $this->conn->prepare($query);
      $stmt->bindValue(1, $category_id);
      $stmt->execute();

      return $stmt->fetchAll();
      }

        public function getAll3tables($orderby, $limit) {
            $query = "SELECT * 
            FROM (products INNER JOIN category ON products.category_id = category.category_id) 
              INNER JOIN images ON products.product_code = images.product_code 
                ORDER BY $orderby DESC LIMIT $limit ;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function getAll3tablesNolimit() {
          $query = "SELECT *
          FROM products INNER JOIN category ON products.category_id = category.category_id 
          INNER JOIN images ON products.product_code = images.product_code ORDER BY products.product_code";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();

          return $stmt->fetchAll();
        }

        public function getById3tables($id) {
          $query = "SELECT * 
            FROM products INNER JOIN category 
              ON products.category_id = category.category_id INNER JOIN images 
                ON images.product_code = products.product_code 
                    WHERE products.product_code = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindValue(1,$id);
          $stmt->execute();

          return $stmt->fetch();
        }

        public function getById2tables($id) {
          $query = "SELECT * FROM products 
            INNER JOIN images ON products.product_code = images.product_code 
            WHERE products.product_code = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetch();
        }

        public function updateById($product_code, $product_name, $category_id, $product_description,
         $instock_quantity,$price, $sold_quantity, $views, $id) 
        {
          $query = "UPDATE products
          SET product_code = ?, product_name = ?, category_id = ?, product_description = ?,
          instock_quantity = ?, price = ?, sold_quantity = ?, views = ? WHERE product_code = ?";

          $stmt = $this->conn->prepare($query);
          $stmt->bindValue(1,$product_code);
          $stmt->bindValue(2,$product_name);
          $stmt->bindValue(3,$category_id);
          $stmt->bindValue(4,$product_description);
          $stmt->bindValue(5,$instock_quantity);
          $stmt->bindValue(6,$price);
          $stmt->bindValue(7,$sold_quantity);
          $stmt->bindValue(8,$views);
          $stmt->bindValue(9,$id);

          $stmt->execute();

          return true;
        }

        public function updateviewbyId($id) {
          $query = "UPDATE products set products.views = products.views+1 where product_code = ?";
          $stmt=$this->conn->prepare($query);
          $stmt->bindValue(1,$id);
          $stmt->execute();

          return true;
        }

        public function updateStockbyId($qty,$id) {
          $query = "UPDATE products
                      SET instock_quantity = instock_quantity - ?, sold_quantity = sold_quantity + ? 
                      WHERE product_code = ?";
                      $stmt = $this->conn->prepare($query);
                      $stmt->bindValue(1,$qty);
                      $stmt->bindValue(2,$qty);
                      $stmt->bindValue(3,$id);

                      $stmt->execute();

                      return true;
        }

        public function updateStockbyIdReverse($qty,$id) {
          $query = "UPDATE products
                      SET instock_quantity = instock_quantity + ?, sold_quantity = sold_quantity - ? 
                      WHERE product_code = ?";
                      $stmt = $this->conn->prepare($query);
                      $stmt->bindValue(1,$qty);
                      $stmt->bindValue(2,$qty);
                      $stmt->bindValue(3,$id);

                      $stmt->execute();

                      return true;
        }        

        public function deleteById($id) {
          $query  = "DELETE FROM products WHERE product_code = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindValue(1,$id);
          $stmt->execute();

          return true;
        }
    }


?>