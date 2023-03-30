<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD FACULTY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="faculty_Name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="faculty_designation" class="form-control" placeholder="Enter Designation" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="faculty_description" class="form-control" placeholder="Enter Description" required>
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="faculty_image" id="faculty_image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_faculty" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculty Members
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#facultyModal">
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
            <dvi class="table-responsive">
                <?php
                $sql = "SELECT * FROM faculty";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['designation'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <!-- <td></td> -->
                                    <td>
                                        <?php
                                        echo '<img src="upload/' . $row['image'] . '" width="100px;" height="100px;" alt="faculty image">'
                                        ?>
                                    </td>
                                    <td>
                                        <form action="faculty_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                            <button type="submit" name="edit_data_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                            <button type="submit" name="faculty_delete_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "NO RECORD FOUND";
                }
                ?>

        </div>
    </div>
</div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>