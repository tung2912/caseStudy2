<?php
// include '../database/database.php';
require_once '../../database/order.php';
$id = $_GET['id'];

$orderDB = new Order;
$order = $orderDB->getById($id);


?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Orders</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="displayOrders.php">Orders</a></li>
                <li class="breadcrumb-item active">Edit Order</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit Order</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editOrder.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Order Date</label>
                                <input type="datetime-local" min="<?=$order['orderDate']?>" class="form-control" name="orderDate" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label></br>
                                <select name="status" id="" style="width:100%">
                                    <option value="NOT CONFIRMED">NOT CONFIRMED</option>
                                    <option value="CONFIRMED">CONFIRMED</option>
                                    <option value="ON DELIVERY">ON DELIVERY</option>
                                    <option value="SHIPPED">SHIPPED</option>
                                    <option value="CANCELED">CANCELED</option>
                                </select>
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