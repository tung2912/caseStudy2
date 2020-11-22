<?php

require_once '../../database/orderDetail.php';
require_once '../../database/order.php';
require_once '../../database/Customer.php';
$id = $_GET['id'];
$orderDetailDB = new OrderDetail;
$orderDB = new Order;
$customerDB = new Customer;
$displayOrder = $orderDB->getById($id);

$customerId = $displayOrder['customer_id'];
$displayCustomer = $customerDB->getById($customerId);

$displayOrderDetail = $orderDetailDB->getByOrderNumber($id);


?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-5">
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="../orders/displayOrders.php">Orders</a></li>
        <li class="breadcrumb-item active"><a href="#">Order Details</a></li>
      </ol>
      <div class="row p-2 border">
        <div class="col">
          <h1 class="text-center">Order</h1>
          <table class="table border">
            <tr>
              <th>Order Number</th>
              <td><?= $displayOrder['orderNumber'] ?></td>
            </tr>
            <tr>
              <th>Customer Id</th>
              <td><?= $displayOrder['customer_id'] ?></td>
            </tr>
            <tr>
              <th>Order Date</th>
              <td><?= $displayOrder['orderDate'] ?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><?= $displayOrder['status'] ?></td>
            </tr>
          </table>
        </div>
        <div class="col">
          <h1 class="text-center">Customer Info</h1>
          <table class="table border">
            <tr>
              <th>Customer Id</th>
              <td><?= $displayCustomer['customer_id'] ?></td>
            </tr>
            <tr>
              <th>Name</th>
              <td><?= $displayCustomer['customer_name'] ?></td>
            </tr>
            <tr>
              <th>Address</th>
              <td><?= $displayCustomer['customer_address'] ?></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td><?= $displayCustomer['customer_phone'] ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?= $displayCustomer['customer_email'] ?></td>
            </tr>
          </table>
        </div>
      </div>
      <h1 class="mt-4 text-center">Order Details</h1>
      <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Price Each</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Price Each</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($displayOrderDetail as $row) :
                ?>
                  <tr>
                    <td><?= $row['product_code'] ?></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><img src="<?= $row['image1'] ?>" alt="" width="90px"></td>
                    <td><?= number_format($row['priceEach']) . " USD" ?></td>
                    <td><?= $row['buy_quantity'] ?></td>
                    <td><?= number_format($row['Total']) . " USD" ?></td>
                    <td class="d-flex">
                      <a href="editOrderDetail.php?product_code=<?= $row['product_code'] ?>&orderNumber=<?=$id?>" class="btn btn-outline-warning ml">Edit</a>
                      <a href="deleteOrderDetail.php?product_code=<?=$row['product_code']?>&orderNumber=<?=$id?>&quantity=<?=$row['buy_quantity']?>" class="btn btn-outline-danger ml-1">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="text-center mb-2">
            <a href="addOrderDetail.php?orderNumber=<?=$id?>">
              <p class="btn btn-success">Add a product</p>
            </a>
          </div>
          <div class="text-center">
            <a href="../orders/displayOrders.php">
              <p class="btn btn-secondary">Back To Orders</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include_once '../layout/footer.php' ?>