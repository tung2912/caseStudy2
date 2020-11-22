<?php
require_once '../../database/user.php';
$userDB = new User;
$displayUsers =$userDB->getAll();
?>
<?php include_once '../layout/header.php'?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="displayUsers.php">Users</a></li>
                    </ol>
                    <a href="addUser.php" style="font-size: larger;">Add a new User</a>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>User Name</th>
                                            <th>User Password</th>
                                            <th>User Phone</th>
                                            <th>User Email</th>
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
                                        <?php foreach($displayUsers as $value): ?>
                                            <tr>
                                                <td><?= $value['id'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['password'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td><?= $value['phone'] ?></td>
                                                <td class="d-flex">
                                                    <a href="editUser.php?id=<?= $value['id'] ?>" class="btn btn-sn btn-outline-primary">Edit</a>
                                                    <a href="deleteUser.php?id=<?= $value['id']; ?>" class="btn btn-danger ml-1">Delete</a>
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