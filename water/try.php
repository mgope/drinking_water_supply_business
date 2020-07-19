<?php
include("conn.php");
$query3="SELECT `date` FROM `orders` WHERE `u_id`=1 ";
$queryData3= mysqli_query($conn, $query3);
$dbArray=mysqli_fetch_assoc($queryData3);
$dates=$dbArray['date'];
echo $dates[4];

// echo $num_row;
// print_r ($date);

// foreach ($queryData3 as $date ) {
//     print_r ($date);
// }
?>