<?php
include '../database/database.php';
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE product_code = '$id'";
$stmt = $pdo->query($query);
$row = $stmt->fetch();

$query1 = 'SELECT * FROM category';
$stmt1 = $pdo->query($query1);
$row1 = $stmt1->fetchAll();

$query2 = 'SELECT * FROM images';
$stmt2 = $pdo->query($query2);
$row2 = $stmt2->fetchAll();
?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayProducts.php">Products</a></li>
                <li class="breadcrumb-item active">Edit Products</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit Products</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editProduct.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" name="productCode" value="<?= $row['product_code'] ?>" >
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productName" value="<?= $row['product_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" id="" style="width:200px">
                                    <?php foreach ($row1 as $value) : ?>
                                        <option value="<?= $value['category_id']; ?>"><?= $value['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" value="<?= $row['product_description'] ?>">
                            </div>
                            <div class="form-group">
                                <label>In stock</label>
                                <input type="text" class="form-control" name="inStock" value="<?= $row['instock_quantity'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Sold</label>
                                <input type="text" class="form-control" name="sold" value="<?= $row['sold_quantity'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Views</label>
                                <input type="text" class="form-control" name="view" value="<?= $row['views'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../layout/footer.php' ?>