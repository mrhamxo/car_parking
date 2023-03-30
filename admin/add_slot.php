<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

if (isset($_POST['slot_btn'])) {
    $slot_name = $_POST['slot_name'];
    $slot_status = $_POST['slot_status'];

    $sql = "INSERT INTO `park_slot`(`slot_name`, `slot_status`) VALUES ('$slot_name', '$slot_status')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // header("location:add_slot.php");
        echo "Data inserted successfully";
        // mysqli_close($conn);
    } else {
        die(mysqli_error($connect));
    }
    // header('location: add_slot.php');
}
?>

<div class="container">

    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">SLot Name</label>
            <input type="text" name="slot_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slot Name" required>
        </div>
        <div class="form-group">
            <label>Slot Status</label>
            <select class="form-control" name="slot_status" required>
                <option value="" selected>Select one</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" name="slot_btn" class="btn btn-primary">Submit</button>
        <button type="submit" name="slot_cancel_btn" class="btn btn-primary">Cancel</button>
    </form>
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>