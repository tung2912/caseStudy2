<?php
session_start();
require_once 'database/product.php';

$productName = $_POST['productName'];
$productDB = new ProductDB;
$productsSearched = $productDB->getByName($productName);
$count = 0;
foreach ($productsSearched as $product) {
  $count++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Street Wear</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/collections.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100 justify-content-end" style="font-size: 1.2rem; font-weight:600">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu myMenu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item myItem" href="categories/topWear.php">Top wear</a>
              <a class="dropdown-item myItem" href="categories/headWear.php">Head Wear</a>
              <a class="dropdown-item myItem" href="categories/bottomWear.php">Bottoms</a>
              <a class="dropdown-item myItem" href="categories/outerWear.php">Outer Wear</a>
              <a class="dropdown-item myItem" href="categories/accessories.php">Accessories</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Collections
            </a>
            <div class="dropdown-menu myMenu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item myItem" href="collections/spring_summer2020.php">Spring Summer 2020</a>
              <a class="dropdown-item myItem" href="collections/fall_winter2019.php">Fall Winter 2019</a>
              <a class="dropdown-item myItem" href="collections/wildTogether.php">Wild Together</a>
            </div>
          </li>
          <li class="nav-item">
            <form class="nav-link" action="searchProduct.php" method="POST">
              <input type="text" name="productName" class="form-control" placeholder="Search Product">
            </form>
          </li>
          <li class="nav-item cartIcon">
            <a class="nav-link" href="cart/cart.php">
              <img src="https://theme.hstatic.net/1000319111/1000411564/14/cart-icon.png?v=1032" alt="" style="width:25px; display:block">
              <span class="cartNumber">

                <?php

                if (isset($_SESSION['cart'])) {
                  $sumQty = 0;
                  foreach ($_SESSION['cart'] as $value) {
                    $sumQty += $value['quantity'];
                  }
                  if ($sumQty == 0) {
                    echo "";
                  } else {
                    echo $sumQty;
                  }
                }
                ?>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="content">
  <div class="container">
    <div class="text-center">
      <h1 class="h1 font-italic">Search</h1>
      <h4 class="h4"><?= $count . " Results" ?></h3>
    </div>
    <div class="row">
      <?php foreach($productsSearched as $product) : ?>
        <div class="col-md-3 col-sm-6 col-xs-6 productItem">
          <div class="productItem img">
            <a href="categories/productDetails.php?product_id=<?= $product['product_code'] ?>">
              <div class="img1">
                <img src="<?= $product['image1'] ?>" alt="" width="100%">
              </div>
              <div class="img2">
                <img src="<?= $product['image2'] ?>" alt="" width="100%">
              </div>
            </a>
          </div>
          <div class="productItem product-name">
            <p class="name"><?= $product['product_name'] ?></p>
          </div>
          <div class="productItem">
            <p class="price"><?= $product['price'] . " USD" ?></p>
          </div>
        </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<?php
require_once 'layout/footer.php';
?>