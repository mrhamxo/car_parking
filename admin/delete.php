<?php
include("connectdb.php");
$sql1 = "SELECT * FROM user_car JOIN park_slot WHERE user_car.parking_slots = park_slot.id";
$query=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($query);
$parking_slot=$row['parking_slots'];
$delete="delete from user_car where parking_slots=$parking_slot";//Deletion Query code here........................................ Hamza Khan
$res=mysqli_query($connect,$delete);
if($res){
header("location:user_car.php");
}
?>