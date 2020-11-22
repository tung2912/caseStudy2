<?php
require_once '../../database/Image.php';
$imageDB = new ImageDB;
$images = $imageDB->getAll();
?>
<?php include_once '../layout/header.php' ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">My Store Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayImages.php">Images</a></li>
                <li class="breadcrumb-item active">Add Image</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Add Image</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_addImage.php">

                            <div class="form-group">
                                <label>Image Id</label>
                                <input type="text" class="form-control" name="image_id" placeholder="Input Image Id" required>
                            </div>
                            <div class="form-group">
                                <label>Product code</label>
                                <input type="text" class="form-control" name="product_code" placeholder="Input the Product Code" required>
                            </div>
                            <div class="form-group">
                                <label>Image1</label>
                                <input type="text" class="form-control" name="image1" placeholder="Input Image 1" required>
                            </div>
                            <div class="form-group">
                                <label>Image2</label>
                                <input type="text" class="form-control" name="image2" placeholder="Input Image 2" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../layout/footer.php' ?>