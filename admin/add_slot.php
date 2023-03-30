<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container">

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">SLot Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slot Name">
        </div>
        <div class="form-group">
            <label>Slot Status</label>
            <select class="form-control" name="usertype">
                <option value="user">Active</option>
                <option value="admin">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-primary">Cancel</button>
    </form>
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>