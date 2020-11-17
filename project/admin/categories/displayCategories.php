<?php
include '../database/database.php';
$query = "SELECT * FROM category";
$stmt = $pdo->query($query);
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
                                        <?php while ($row = $stmt->fetch()) { ?>
                                            <tr>
                                                <td><?= $row['category_id'] ?></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <td><?= $row['category_description'] ?></td>
                                                <td><img src="<?= $row['category_image'] ?>" alt="" style="max-width:100px; max-height:100px"></td>
                                                <td class="d-flex">
                                                    <a href="editCategory.php?id=<?= $row['category_id'] ?>" class="btn btn-sn btn-outline-primary">Edit</a>
                                                    <a href="deleteCategory.php?id=<?= $row['category_id']; ?>" class="btn btn-danger ml-1">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once '../layout/footer.php' ?>