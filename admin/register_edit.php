<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="card-header">
    <h5 class="card-title text-primary mt-3">Edit Admin Profile</h5>
</div>
<div class="card-body">

    <?php
    if (isset($_POST['edit_btn'])) {
        $id = $_POST['edit_id'];
        $sql = "SELECT * FROM `users` WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

        foreach ($result as $row) {
        }
    };

    ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" />
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label>User Type</label>
            <select class="form-control" name="update_usertype">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
            <a href="register.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>

</div>
<!-- end container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>