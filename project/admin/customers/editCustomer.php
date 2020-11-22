<?php
require_once '../../database/Customer.php';
$id = $_GET['id'];

$customerDB = new Customer;
$customer = $customerDB->getById($id);
?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Customers</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayCustomers.php">Customers</a></li>
                <li class="breadcrumb-item active">Edit Customers</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit Customers</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editCustomer.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" placeholder="<?= $customer['customer_name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Address</label>
                                <input type="text" class="form-control" name="customer_address" placeholder="<?= $customer['customer_address'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Phone</label>
                                <input type="text" class="form-control" name="customer_phone" placeholder="<?= $customer['customer_phone'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="text" class="form-control" name="customer_email" placeholder="<?= $customer['customer_email'] ?>" required>
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