<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculties </h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if (isset($_POST['edit_data_btn'])) {

            $id = $_POST['edit_id'];    

            $sql = "SELECT * FROM `faculty` WHERE id='$id'";
            $result = mysqli_query($connect, $sql);

            foreach ($result as $row) {
        ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <label>Name</label>
                        <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="edit_designation" value="<?php echo $row['designation'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>upload Image</label>
                        <input type="file" name="faculty_image" id="faculty_image" class="form-control">
                    </div>
                    <button type="submit" name="faculty_update_btn" class="btn btn-primary">Update</button>
                    <a href="faculty.php" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                </form>
        <?php
            }
        }
        ?>
    </div>
</div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>