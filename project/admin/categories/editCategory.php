<?php
require_once '../../database/category.php';
$id = $_GET['id'];

$categoryDB = new Category;
$category = $categoryDB->getById($id);
?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayCategories.php">Categories</a></li>
                <li class="breadcrumb-item active">Edit Categories</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit Categories</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editCategory.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input type="text" class="form-control" name="categoryCode" placeholder="<?= $category['category_id'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="categoryName" placeholder="<?= $category['category_name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="categoryDescription" placeholder="<?= $category['category_description'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Image link</label>
                                <input type="text" class="form-control" name="image" placeholder="<?= $category['category_image'] ?>" required>
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