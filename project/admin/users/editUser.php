<?php
require_once '../../database/user.php';
$id = $_GET['id'];

$userDB = new User;
$user = $userDB->getById($id);

?>
<?php include_once '../layout/header.php' ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="displayUsers.php">Users</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-12">
                        <form method="post" action="xl_editUser.php">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="name" placeholder="<?= $user['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>User Password</label>
                                <input type="text" class="form-control" name="password" placeholder="<?= $user['password'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="email" class="form-control" name="email" placeholder="<?= $user['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label> User Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="<?= $user['phone'] ?>" required>
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