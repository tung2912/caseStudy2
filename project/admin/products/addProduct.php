<?php
// include '../database/database.php';
require_once '../../database/category.php';
// $query = 'SELECT * FROM category';
// $stmt = $pdo->query($query);
// $row = $stmt->fetchAll();
$categoryDB = new Category;
$category = $categoryDB->getAll();

$query1 = 'SELECT * FROM images';
$stmt = $pdo->query($query1);
$row1 = $stmt->fetchAll();
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Products</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="displayProducts.php">Products</a></li>
        <li class="breadcrumb-item active">Add product</li>
      </ol>
      <div class="col-12 col-md-12">
        <div class="row">
          <div class="col-12">
            <h1>Add Product</h1>
          </div>
          <div class="col-12">
            <form method="post" action="xl_addProduct.php">
              <div class="form-group">
                <label>Product Code</label>
                <input type="text" class="form-control" name="productCode" placeholder="Input Product Code" required>
              </div>
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" name="productName" placeholder="Input Product Name" required>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select name="category" id="">
                  <?php foreach ($category as $value) : ?>
                    <option value="<?= $value['category_id']; ?>"><?= $value['category_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Input the Product Descriptions" required>
              </div>
              <div class="form-group">
                <label>In stock</label>
                <input type="text" class="form-control" name="inStock" placeholder="Input the amount in stock" required>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Input price" required>
              </div>
              <div class="form-group">
                <label>Sold</label>
                <input type="text" class="form-control" name="soldQuantity" placeholder="Input sold amount" required>
              </div>
              <div class="form-group">
                <label>Views</label>
                <input type="text" class="form-control" name="views" placeholder="Input views" required>
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