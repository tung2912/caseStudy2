<?php
include __DIR__. "/../admin/database/database.php";
require_once '../database/Customer.php';
require_once '../database/order.php';
require_once '../database/orderDetail.php';
require_once '../database/product.php';
session_start();
$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if ($_SERVER["REQUEST_METHOD"]=="POST") {
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$orderDetailDB = new OrderDetail;
$customerDB = new Customer;
$orderDB = new Order;
$productDB = new ProductDB;

$insertCustomer = $customerDB->insert($name, $address, $phone, $email);
$customer_id = $customerDB->getLastInsert();

$insertOrder = $orderDB->insert($customer_id);
$orderNumber = $orderDB->getLastInsert();

foreach($_SESSION['cart'] as $id => $value){
  $qty = $value['quantity'];
  $price = $value['price'];
  $insertDetails = $orderDetailDB->insert($orderNumber, $id, $qty, $price);

  $changeStock = $productDB->updateStockById($qty, $id);
}
unset($_SESSION['cart']);
header ('location:successPayment.php');
}

     

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Tusic Streetwear</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/checkout.css">
</head>

<body>
  <div class="container">
    <div class="row flex-wrap-reverse">
      
        <div class="col">
        <form action="" method="POST">
          <div class="my-5">
            <div class="header">
              <img src="https://cdn.shopify.com/s/files/1/1687/1083/files/logo_Mollyclo_2019-black_381741f7-4ec7-4159-a976-9fc1e43dfe9c.png?157" alt="">
            </div>
            <div class="title">
              Check Out
            </div>

            <div class="shipInfo mt-4">
              <div class="label-shipInfo">
                <label for="">Shipping Information</label>
              </div>
              <div class="input-group">
                <input type="text" name="name" class="form-control float-right" placeholder="Full name" required>
              </div>
              <div class="input-group mt-2">
                <input type="text" name="address" class="form-control" placeholder="Address" required>
              </div>
              <div class="input-group mt-2">
                <input type="text" name="phone" class="form-control float-left mr-1" placeholder="Phone Number" required>
                <input type="email" name="email" class="form-control float-right ml-1" placeholder="Email address" required>
                <div class="clearfix"></div>
              </div>
              <div class="float-left mt-2">
                <a href="cart.php" class="cart_return">
                  < Return to cart</a> </div> <div class="float-right mt-2">
                    <input type="submit" class="btn btn-dark p-3" value="Continue Payment">
              </div>
            </div>

          </div>
          </form>
        </div>
    
      <div class="col payment-right my-4" style="background: #fafafa;">
        <div class="mr-3">
          <div class="my-2 checkoutHeader">
            Cart information
          </div>
          <?php
          $subtotal = 0;
          foreach ($products as $item) :
            $total = $item['price'] * $item['quantity'];
            $subtotal += $total;
          ?>
            <div class="">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="img_wrapper">
                        <img src="<?= $item['image'] ?>" alt="" class="imgCheckout">
                        <span class="qtyCheckout">
                          <?= $item['quantity'] ?>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="checkoutItemName">
                        <?= $item['name'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="checkoutItemPrice">
                        <?= $total . " USD" ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php endforeach; ?>
          <div class="mt-2 checkoutFooter">
            <div class="float-left ml-3 left">
              Total
            </div>

            <div class="float-right right">
              <?= $subtotal . " USD" ?>
            </div>
            <div class="clearfix"></div>
            <div class="float-left ml-3 left">
              Shipping
            </div>
            <div class="float-right right">
              Free
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>