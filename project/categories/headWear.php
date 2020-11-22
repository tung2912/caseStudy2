<?php
require_once '../database/product.php';
session_start();

$productDB = new ProductDB;
$headWear = $productDB->getAllByCategory(2);
?>
<?php
include '../layout/header.php';
?>
<div class="content">
  <div class="banner">
    <div class="banner_img_headWear">
    </div>
    <div class="banner_content">
      <div class="banner_content_text">
        <h1>HEADWEAR</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php foreach ($headWear as $item) : ?>
        <div class="col-md-3 col-sm-6 col-xs-6 productItem">
          <div class="productItem img">
            <a href="productDetails.php?product_id=<?= $item['product_code'] ?>">
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
<?php
include '../layout/footer.php';
?>