<?php

require_once '../../database/Image.php';
$imageDB = new ImageDB;
$displayImages =$imageDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Images</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="displayImages.php">Images</a></li>
                    </ol>
                    <a href="addImage.php" style="font-size: larger;">Add a new Image</a>
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image Id</th>
                                            <th>Product Code</th>
                                            <th>Image1</th>
                                            <th>Image2</th>
                                            <th>Image3</th>
                                            <th>Image4</th>
                                            <th>Image5</th>
                                            <th>Image6</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Image Id</th>
                                            <th>Product Code</th>
                                            <th>Image1</th>
                                            <th>Image2</th>
                                            <th>Image3</th>
                                            <th>Image4</th>
                                            <th>Image5</th>
                                            <th>Image6</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($displayImages as $value): ?>
                                            <tr>
                                                <td><?= $value['image_id'] ?></td>
                                                <td><?= $value['product_code'] ?></td>
                                                <td><img src="<?= $value['image1'] ?>" width="90px"></td>
                                                <td><img src="<?= $value['image2'] ?>" width="90px"></td>
                                                <td><img src="<?= $value['image3'] ?>" width="90px"></td>
                                                <td><img src="<?= $value['image4'] ?>" width="90px"></td>
                                                <td><img src="<?= $value['image5'] ?>" width="90px"></td>
                                                <td><img src="<?= $value['image6'] ?>" width="90px"></td>
                                                <td class="d-flex">
                                                    <a href="editImage.php?id=<?= $value['image_id'] ?>" class="btn btn-sn btn-outline-primary">Edit</a>
                                                    <a href="deleteImage.php?id=<?= $value['image_id']; ?>" class="btn btn-danger ml-1">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once '../layout/footer.php' ?>