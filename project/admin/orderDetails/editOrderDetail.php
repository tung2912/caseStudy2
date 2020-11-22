<?php
require_once '../../database/orderDetail.php';
$product_code = $_GET['product_code'];
$orderNumber = $_GET['orderNumber'];

$orderDetailDB = new OrderDetail;
$productOrderDetail = $orderDetailDB->getById($orderNumber, $product_code);
$old_quantity = $productOrderDetail['buy_quantity'];
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">OrderDetails</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayOrderDetails.php?id=<?=$product_code?>">OrderDetails</a></li>
                <li class="breadcrumb-item active">Edit OrderDetail</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit OrderDetail</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editOrderDetail.php">
                            <input type="hidden" name="orderNumber" value="<?= $orderNumber ?>">
                            <input type="hidden" name="old_product_code" value="<?= $product_code ?>">
                            <input type="hidden" name ="old_quantity" value="<?=$old_quantity?>">
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" name="new_product_code" placeholder="<?= $productOrderDetail['product_code'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="new_quantity" placeholder="<?= $productOrderDetail['buy_quantity'] ?>" required>
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