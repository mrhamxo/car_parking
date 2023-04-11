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
            <!-- Total park slot Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total parking slot
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT
                                    COUNT(if(slot_status='active' && slot_status='inactive', 1, 0)) as slot
                                    FROM `park_slot`";

                                    $result = mysqli_query($connect, $sql);

                                    while ($query_array = mysqli_fetch_array($result)) {
                                        $slot = $query_array['slot'];

                                        echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Availible park slot Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Availible park slot
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT
                                    COUNT(if(slot_status='active', 1, NULL)) as slot
                                    FROM `park_slot`";

                                    $result = mysqli_query($connect, $sql);

                                    while ($query_array = mysqli_fetch_array($result)) {
                                        $slot = $query_array['slot'];

                                        echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Availible park slot Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Unavailible park slot
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT
                                            COUNT(if(slot_status='inactive', 0, NULL)) as slot
                                            FROM `park_slot`";

                                            $result = mysqli_query($connect, $sql);

                                            while ($query_array = mysqli_fetch_array($result)) {
                                                $slot = $query_array['slot'];

                                                echo '<h4 class="font-weight-bolder">' . $slot . '</h4>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
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