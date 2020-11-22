<?php
require_once '../../database/order.php';

$orderDB = new Order;
$notConfirmedOrders = $orderDB->getByStatus('NOT CONFIRMED');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $confirmOrder = $orderDB->updateStatusById('NOT CONFIRMED', 'CONFIRMED', $id);
    header('location: notConfirmedOrders.php');
    }
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Orders</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="displayOrders.php">Orders</a></li>
                <li class="breadcrumb-item active"><a href="notConfirmedOrders.php">Not Confirmed Orders</a></li>
            </ol>
            <div class="card mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Customer Id</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Customer Id</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($notConfirmedOrders as $row) : ?>
                                    <tr>
                                        <td><?= $row['orderNumber'] ?></td>
                                        <td><?= $row['customer_id'] ?></td>
                                        <td><?= $row['orderDate'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td class="d-flex">
                                            <a href="?id=<?= $row['orderNumber'] ?>" class="btn btn-outline-success ml-1">Confirm</a>
                                            <a href="../orderDetails/displayOrderDetails.php?id=<?= $row['orderNumber'] ?>" class="btn btn-outline-primary ml-1">Details</a>
                                            <a href="editOrder.php?id=<?= $row['orderNumber'] ?>" class="btn btn-outline-warning ml-1">Edit</a>

                                            <a href="deleteOrder.php?id=<?= $row['orderNumber']; ?>" class="btn btn-outline-danger ml-1">Delete</a>
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