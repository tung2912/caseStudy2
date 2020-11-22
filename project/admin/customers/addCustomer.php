<?php
require_once '../../database/Customer.php';

$customerDB = new Customer;
$customers = $customerDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">My Store Admin</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="displayCustomers.php">Customers</a></li>
        <li class="breadcrumb-item active">Add Customer</li>
      </ol>
      <div class="col-12 col-md-12">
        <div class="row">
          <div class="col-12">
            <h1>Add Customer</h1>
          </div>
          <div class="col-12">
            <form method="post" action="xl_addCustomer.php">

              <div class="form-group">
                <label>Customer Name</label>
                <input type="text" class="form-control" name="customer_name" placeholder="Input Customer Name" required>
              </div>
              <div class="form-group">
                <label>Customer Address</label>
                <input type="text" class="form-control" name="customer_address" placeholder="Input the Customer Address" required>
              </div>
              <div class="form-group">
                <label>Customer Phone</label>
                <input type="text" class="form-control" name="customer_phone" placeholder="Input the Customer Phone Number " required>
              </div>
              <div class="form-group">
                <label>Customer Email</label>
                <input type="email" class="form-control" name="customer_email" placeholder="Input the Customer Email Address " required>
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