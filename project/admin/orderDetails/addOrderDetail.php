<?php
require_once '../../database/category.php';
require_once '../../database/product.php';
$orderNumber = $_GET['orderNumber'];
$productDB = new ProductDB;
$products = $productDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">OrderDetails</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="displayOrderDetails.php?id=<?=$orderNumber?>">OrderDetails</a></li>
        <li class="breadcrumb-item active">Add product to OrderDetail</li>
      </ol>
      <div class="col-12 col-md-12">
        <div class="row">
          <div class="col-12">
            <h1>Add Product</h1>
          </div>
          <div class="col-12">
            <form method="post" action="xl_addOrderDetail.php">
                <input type="hidden" name="orderNumber" value="<?=$orderNumber?>">
              <div class="form-group">
                <label>Product Code</label>
                <select name="product_code" id="" style="width:100%">
                    <?php foreach($products as $product):?>
                        <option value="<?=$product['product_code']?>"><?=$product['product_code']?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" name="buy_quantity" placeholder="Input Quantity" required>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
              <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include_once '../layout/footer.php' ?>