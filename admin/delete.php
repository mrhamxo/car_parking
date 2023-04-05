<?php
include("connectdb.php");
$sql1 = "SELECT * FROM user_car";
$query=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($query);
$car_id=$row['id'];
$delete="delete from user_car where id='$car_id'";//Deletion Query code here........................................ Hamza Khan
$res=mysqli_query($connect,$delete);
if($res){
header("location:user_car.php");
}
?>