<?php
require_once 'database/product.php';

$productDB = new ProductDB;

$newProducts = $productDB->getAll3tables('products.update_date', 4);
$bestSellProducts = $productDB->getAll3tables('products.sold_quantity', 4);
$hotproducts = $productDB->getAll3tables('products.views', 4);

session_start();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
            <a class="nav-link" href="categories/aboutUs.php">About Us</a>
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
    <div id="carouselExampleControls" class="carousel slide slidebar" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/banner1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/banner2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/banner3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container mt-5">
      <div class="d-flex categoryTitle">
        <h1 class="m-auto font-weight-bold">NEW ARRIVALS</h1>
      </div>
      <div class="row product">
        <?php foreach ($newProducts as $item) : ?>
          <div class="col-md-3 col-sm-6 col-xs-6 productItem">
            <div class="productItem img">
              <a href="categories/productDetails.php?product_id=<?= $item['product_code'] ?>">
                <div class="img1">
                  <img src="<?= $item['image1'] ?>" alt="" width="100%">
                </div>
                <div class="img2">
                  <img src="<?= $item['image2'] ?>" alt="" width="100%">
                </div>
            </div></a>
            <div class="productItem product-name">
              <p class="name"><?= $item['product_name'] ?></p>
            </div>
            <div class="productItem">
              <p class="price"><?= $item['price'] . " USD" ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="container">
      <div class="d-flex categoryTitle">
        <h1 class="m-auto font-weight-bold my-5">BEST SELL</h1>
      </div>
      <div class="row product">
        <?php foreach ($bestSellProducts as $item) : ?>
          <div class="col-md-3 col-sm-6 col-xs-6 productItem">
            <div class="productItem img">
              <a href="categories/productDetails.php?product_id=<?= $item['product_code'] ?>">
                <div class="img1">
                  <img src="<?= $item['image1'] ?>" alt="" width="100%">
                </div>
                <div class="img2">
                  <img src="<?= $item['image2'] ?>" alt="" width="100%">
                </div>
              </a>
            </div>
            <div class="productItem product-name">
              <p class="name"><?= $item['product_name'] ?></p>
            </div>
            <div class="productItem">
              <p class="price"><?= $item['price'] . " USD" ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="container">
      <div class="d-flex categoryTitle">
        <h1 class="m-auto font-weight-bold my-5">HOT PRODUCTS</h1>
      </div>
      <div class="row product">
        <?php foreach ($hotproducts as $item) : ?>
          <div class="col-md-3 col-sm-6 col-xs-6 productItem">
            <div class="productItem img">
              <a href="categories/productDetails.php?product_id=<?= $item['product_code'] ?>">
                <div class="img1">
                  <img src="<?= $item['image1'] ?>" alt="" width="100%">
                </div>
                <div class="img2">
                  <img src="<?= $item['image2'] ?>" alt="" width="100%">
                </div>
              </a>
            </div>
            <div class="productItem product-name">
              <p class="name"><?= $item['product_name'] ?></p>
            </div>
            <div class="productItem">
              <p class="price"><?= $item['price'] . " USD" ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="mtFooter my-5">
    <div class="bg-dark text-white p-5">
      <div class="my-5">
        <h1 class="text-center" style="font-family: 'Roboto Condensed', sans-serif;">
          Thanks for visiting our store !!!
        </h1>
      </div>
    </div>
    <div class="container mt-5">
      <div class="d-flex justify-content-center h1">
        <div class="ml-5 social"><i class="fab fa-instagram"></i></div>
        <div class="ml-5 social"><i class="fab fa-facebook"></i></div>
        <div class="ml-5 social"><i class="fab fa-youtube"></i></div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="ml-5 footer-link">Privacy Policy</div>
        <div class="ml-5 footer-link">Refund Policy</div>
        <div class="ml-5 footer-link">Terms of Service</div>
      </div>
      <div class="text-center mt-4">
        <span style="font-family: 'Roboto', sanserif; font-size:1em">
          © 2020 NTCLO

        </span>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>