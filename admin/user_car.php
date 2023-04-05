<?php
include("connectdb.php");
include('security.php');
include('includes/header.php');
echo "<script>if(window.history.replaceState){
                              window.history.replaceState(null,null,window.location.href);
                              }  
                              </script>";
include('includes/navbar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">
                        <?php
                        if (isset($_POST["submit"])) {
                            $par_address = $_POST['park_address'];
                            $par_slots = $_POST['park_slots'];
                            $par_area = $_POST['park_area'];
                            $sql = "INSERT INTO `user_car` (`parking_address`, `parking_slots`, `parking_area`, `status`, `action`) VALUES ('$par_address', '$par_slots', '$par_area', '1', '0')";
                            $res = mysqli_query($connect, $sql);
                            if ($res) {
                                // header("location:user_car.php");
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="parkingaddress">Parking Address</label>
                            <input type="text" name="park_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please Enter Parking Address">
                        </div>
                        <div class="form-group">
                            <label>Parking Slots</label>
                            <select class="form-control" name="park_slots">
                                <option>Please Add Car Slots</option>
                                <?php
                                $sql = "SELECT * FROM park_slot";
                                $result = mysqli_query($connect, $sql) or die("Query Unsuccessful");

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['slot_id'] ?>"><?php echo $row['slot_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parking Area</label>
                            <input type="text" name="park_area" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please Enter Parking Area">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add User car
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Add User Car
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

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Parking Address</th>
                            <th scope="col">Parking Slots</th>
                            <th scope="col">Parking Area</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $sql1 = "SELECT * FROM `user_car`";
                        $sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots = park_slot.slot_id";
                        $res = mysqli_query($connect, $sql1);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['parking_address']; ?></td>
                                <td><?php echo $row['slot_name']; ?></td>
                                <td><?php echo $row['parking_area']; ?></td>
                                <td>
                                    <?php if ($row['status'] == '1') { ?>
                                        <span class="badge bg-warning p-2 text-white">Active</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger p-2 text-white">Inactive</span>
                                    <?php } ?>
                                </td>
                                <td><a href="delete.php" class="btn btn-primary" nam="delete" value="<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- end container fluid -->
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>