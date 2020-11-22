<?php
require_once '../../database/Customer.php';
$customerDB = new Customer;
$displayCustomers =$customerDB->getAll();
?>
<?php include_once '../layout/header.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Customers</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="displayCustomers.php">Customers</a></li>
                    </ol>
                    <a href="addCustomer.php" style="font-size: larger;">Add a new Customer</a>
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Address</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Address</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Email</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($displayCustomers as $value): ?>
                                            <tr>
                                                <td><?= $value['customer_id'] ?></td>
                                                <td><?= $value['customer_name'] ?></td>
                                                <td><?= $value['customer_address'] ?></td>
                                                <td><?= $value['customer_phone'] ?></td>
                                                <td><?= $value['customer_email'] ?></td>
                                                <td class="d-flex">
                                                    <a href="editCustomer.php?id=<?= $value['customer_id'] ?>" class="btn btn-sn btn-outline-primary">Edit</a>
                                                    <a href="deleteCustomer.php?id=<?= $value['customer_id']; ?>" class="btn btn-danger ml-1">Delete</a>
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