<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>


<!-- sweat alert -->
<script src="js/sweetalert.min.js"></script>

<?php
if (isset($_SESSION['status']) && ($_SESSION['status']) != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK DONE!",
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>

<!-- custom js -->
<script src="js/custom.js"></script>