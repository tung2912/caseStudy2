<?php
include '../admin/database/database.php';
$product_id = $_GET['product_id'];
$query1 = "SELECT * 
FROM products INNER JOIN category 
ON products.category_id = category.category_id INNER JOIN images 
ON images.product_code = products.product_code where products.product_code = '$product_id';";
$stmt1 = $pdo->query($query1);
$product = $stmt1->fetch();
$query2 = "SELECT * FROM images WHERE images.product_code = '$product_id'";
$stmt2 = $pdo->query($query2);
$images = $stmt2->fetch();
$query3 = "UPDATE products set products.views = products.views+1 where product_code = '$product_id'";
$pdo->query($query3);
session_start();


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
                        <img class="smallImg" src="<?= $images['image1'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image2'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image3'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image4'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image5'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image6'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image7'] ?>" alt="" onclick="myFunction(this);">
                        <img class="smallImg" src="<?= $images['image8'] ?>" alt="" onclick="myFunction(this);">

                    </div>
                    <div class="col-9">
                        <img class="bigImg" id="expandedImg" src="<?= $images['image1'] ?>" alt="">
                        <!-- <img class="bigImg" src="<?= $images['image2'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image3'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image4'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image5'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image6'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image7'] ?>" alt="">
                        <img class="bigImg" src="<?= $images['image8'] ?>" alt=""> -->
                    </div>
                </div>
            </div>
            <div class="col-5">
                <h1><?= $product['product_name'] ?></h1>
                <p><?= $product['price'] . " USD" ?></p>
                <p>Descriptions</p>
                <p><?=$product['product_description']?></p>
                
                <div class="d-flex">

                <a href="../cart/cart_process.php?id=<?=$product['product_code']?>" class="btn btn-outline-secondary">ADD TO CART</a></br>
                <a href="" class="btn btn-secondary ml-4">BUY IT NOW</a>
                </div>


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