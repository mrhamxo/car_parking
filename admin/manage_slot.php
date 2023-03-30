<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- Modal -->
<div class="modal fade" id="slotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculties
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#slotModal">
                    Add slot
                </button>
            </h6>
        </div>
        <div class="card-body">
            <dvi class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Slot Name</th>
                            <th scope="col">Acive</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>