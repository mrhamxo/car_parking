<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid" style="margin-left:100px">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Content Row -->
        <div class="row my-4 justify-content-center">
            <!-- Total Registered Admins Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Admins Registered
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    // $sql = "SELECT id FROM `users` ORDER BY id";
                                    $sql = "SELECT
                                    COUNT(if(usertype='admin', 1, NULL)) as admin
                                    FROM `users`";

                                    $result = mysqli_query($connect, $sql);
                                    // $row = mysqli_num_rows($result);

                                    while ($query_array = mysqli_fetch_array($result)) {
                                        $admin = $query_array['admin'];

                                        echo '<h4 class="font-weight-bolder">' . $admin . '</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Users Registered
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT
                                     COUNT(if(usertype='user', 1, NULL)) as user
                                     FROM `users`";

                                    $result = mysqli_query($connect, $sql);
                                    $row = mysqli_num_rows($result);

                                    while ($query_array = mysqli_fetch_array($result)) {
                                        $user = $query_array['user'];

                                        echo '<h4 class="font-weight-bolder">' . $user . '</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-left:70px">

    <div class="row">
        <?php
        $sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots = park_slot.slot_id";
        $res = mysqli_query($connect, $sql1);
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <?php
            if ($row['status'] == 1) {
            ?>

                <div class="col-2 p-4 pb-4 bg-success text-white m-2 text-center">
                    <?php echo "Car_Id:" . $row['id']; ?>
                    <?php echo "Parking_Address:" . $row['parking_address']; ?>
                    <?php echo "Parking_Slots:" . $row['parking_slots']; ?>
                    <?php echo "Parking_Area:" . $row['parking_area']; ?>
                    <?php echo "Slots_Name:" . $row['slot_name']; ?>
                </div>
            <?php
            } else {
            ?>
                <div class="col-2 p-4 pb-4 bg-danger text-white m-2 text-center">
                    <?php echo "Car_Id:" . $row['id']; ?>
                    <?php echo "Parking_Address:" . $row['parking_address']; ?>
                    <?php echo "Parking_Slots:" . $row['parking_slots']; ?>
                    <?php echo "Parking_Area:" . $row['parking_area']; ?>
                    <?php echo "Slots_Name:" . $row['slot_name']; ?>
                </div>
            <?php
            }
            ?>
        <?php
        }
        ?>

    </div>

</div>
</div>

<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>