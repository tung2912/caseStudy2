<?php
require_once '../../database/category.php';
$categoryDB = new Category;
$display =$categoryDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Categories</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="displayCategories.php">Categories</a></li>
                    </ol>
                    <a href="addCategory.php" style="font-size: larger;">Add a new Category</a>
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($display as $value): ?>
                                            <tr>
                                                <td><?= $value['category_id'] ?></td>
                                                <td><?= $value['category_name'] ?></td>
                                                <td><?= $value['category_description'] ?></td>
                                                <td><img src="<?= $value['category_image'] ?>" alt="" style="max-width:100px; max-height:100px"></td>
                                                <td class="d-flex">
                                                    <a href="editCategory.php?id=<?= $value['category_id'] ?>" class="btn btn-sn btn-outline-primary">Edit</a>
                                                    <a href="deleteCategory.php?id=<?= $value['category_id']; ?>" class="btn btn-danger ml-1">Delete</a>
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