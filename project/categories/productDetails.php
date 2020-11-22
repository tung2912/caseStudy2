<?php
require_once '../database/product.php';
require_once '../database/Image.php';
session_start();
$product_id = $_GET['product_id'];

$productDB = new ProductDB;
$product = $productDB->getById3tables($product_id);
$category_id = $product['category_id'];

$productsSameCategory = $productDB->getAllByCategoryLimit($category_id);

$imageDB = new ImageDB;
$image = $imageDB->getById($product_id);

$updateviews = $productDB->updateviewbyId($product_id);
?>
<?php
include '../layout/header.php';
?>
<div class="content">
  <div class="contentDetail">
    <div class="row">
      <div class="col-7">
        <div class="row">
          <div class="col-3">
            <img class="smallImg mb-3" src="<?= $image['image1'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image2'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image3'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image4'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image5'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image6'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image7'] ?>" alt="" onclick="myFunction(this);">
            <img class="smallImg mb-3" src="<?= $image['image8'] ?>" alt="" onclick="myFunction(this);">
          </div>
          <div class="col-9">
            <img class="bigImg" id="expandedImg" src="<?= $image['image1'] ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col-5">
        <h1><?= $product['product_name'] ?></h1>
        <p><?= $product['price'] . " USD" ?></p>
        <p>Descriptions</p>
        <p><?= $product['product_description'] ?></p>
        <div class="d-flex">
          <a href="../cart/cart_process.php?id=<?= $product['product_code'] ?>" class="btn btn-outline-secondary">ADD TO CART</a></br>
        </div>
      </div>
    </div>
    <div class="my-5">
    <div class="text-center">
      <h1 class="h1 mb-5 font-italic font-weight-bolder">YOU MAY ALSO LIKE </h1>
    </div>
    <div class="row">
      <?php foreach ($productsSameCategory as $product) : ?>
        <div class="col-md-3 col-sm-6 col-xs-6 productItem">
          <div class="productItem img">
            <a href="productDetails.php?product_id=<?= $product['product_code'] ?>">
              <div class="img1">
                <img src="<?= $product['image1'] ?>" alt="" width="100%">
              </div>
              <div class="img2">
                <img src="<?= $product['image2'] ?>" alt="" width="100%">
              </div>
          </div></a>
          <div class="productItem product-name">
            <p class="name"><?= $product['product_name'] ?></p>
          </div>
          <div class="productItem">
            <p class="price"><?= $product['price'] . " USD" ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</div>
<script>
  function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
    expandImg.parentElement.style.display = "block";
  }
</script>
<?php
include '../layout/footer.php';
?>