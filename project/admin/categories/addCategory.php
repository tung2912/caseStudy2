<?php
require_once '../../database/category.php';

$categoryDB = new Category;
$categories = $categoryDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">My Store Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayCategories.php">Categories</a></li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Add Category</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_addCategory.php">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input type="text" class="form-control" name="categoryCode" placeholder="Input Category Code" required>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="categoryName" placeholder="Input Category Name" required>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Input the Category Descriptions" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="text" class="form-control" name="image" placeholder="Input the Category image link " required>
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