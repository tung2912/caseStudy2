<?php

require_once '../../database/Image.php';
$id = $_GET['id'];

$imageDB = new ImageDB;
$image = $imageDB->getById($id);
?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Images</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayImages.php">Images</a></li>
                <li class="breadcrumb-item active">Edit Images</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit Images</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editImage.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Image Id</label>
                                <input type="text" class="form-control" name="image_id" placeholder="<?= $image['image_id'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Product code </label>
                                <input type="text" class="form-control" name="product_code" placeholder="<?= $image['product_code'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Image 1</label>
                                <input type="text" class="form-control" name="image1" placeholder="<?= $image['image1'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Image 2</label>
                                <input type="text" class="form-control" name="image2" placeholder="<?= $image['image2'] ?>" required>
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