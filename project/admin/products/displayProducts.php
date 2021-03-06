<?php

require_once '../../database/product.php';
$productDB = new ProductDB;
$display = $productDB->getAll3tablesNolimit();

?>
<?php include_once '../layout/header.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Products</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="displayProducts.php">Products</a></li>
                    </ol>
                    <a href="addProduct.php" style="font-size: larger;">Add a new product</a>
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <!-- <th>Descriptions</th> -->
                                            <th>In stock</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Sold</th>
                                            <th>Views</th>
                                            <!-- <th>Update date</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <!-- <th>Descriptions</th> -->
                                            <th>In stock</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Sold</th>
                                            <th>Views</th>
                                            <!-- <th>Update date</th> -->
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($display as $row): ?>
                                            <tr>
                                                <td><?= $row['product_code'] ?></td>
                                                <td><?= $row['product_name'] ?></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <!-- <td><?= $row['product_description'] ?></td> -->
                                                <td><?= $row['instock_quantity'] ?></td>
                                                <td><?= $row['price'] . " USD" ?></td>
                                                <td><img src="<?= $row['image1'] ?>" alt="" style="max-width:100px; max-height:100px"></td>
                                                <td><?= $row['sold_quantity'] ?></td>
                                                <td><?= $row['views'] ?></td>
                                                <!-- <td><?= $row['update_date'] ?></td> -->
                                                <td class="d-flex">
                                                    <a href="editProduct.php?id=<?= $row['product_code'] ?>" class="btn btn-outline-primary">Edit</a>

                                                    <a href="deleteProduct.php?id=<?= $row['product_code']; ?>" class="btn btn-outline-danger ml-1">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once '../layout/footer.php' ?>