<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" name="usertype">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Register</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$sql = "SELECT * FROM `users` WHERE 1";
$result = mysqli_query($connect, $sql);
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Profile
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    ADD
                </button>
            </h6>
        </div>
        <div class="card-body">
            <?php
            // if (isset($_SESSION['success']) && ($_SESSION['success']) != '') {
            //     echo '<h2 class="my-2 bg-primary text-white">' . $_SESSION['success'] . ' </h2>';
            //     unset($_SESSION['success']);
            // }
            // if (isset($_SESSION['status']) && ($_SESSION['status']) != '') {
            //     echo '<h2 class="my-2 bg-danger text-white">' . $_SESSION['status'] . ' </h2>';
            //     unset($_SESSION['status']);
            // }
            ?>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Update</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td scope="row"><?php echo $row['id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['usertype'] ?></td>
                                <td>
                                    <form action="register_edit.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                        <button name="edit_btn" class="btn btn-secondary">EDIT</button>
                                    </form>
                                </td>
                                <!-- <td>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                    </form>
                                </td> -->
                                <td>
                                    <?php
                                        if($row['status'] == 1){
                                            echo '<a class="btn btn-success" href="status.php?id='.$row['id'].'&status=0">Active</a>';
                                        }
                                        else{
                                            echo '<a class="btn btn-danger" href="status.php?id='.$row['id'].'&status=1">Inactive</a>';
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- end container fluid -->
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>