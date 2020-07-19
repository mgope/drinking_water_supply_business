<?php
if(isset($_POST['number']) && ($_POST['user_id'])){
    $user_id=$_POST['user_id'];
    $number=$_POST['number'];
    include("conn.php");
    $query="UPDATE `users`SET `unpaid`=`unpaid`- '$number' WHERE `id`='$user_id' ";
    $queryData= mysqli_query($conn, $query);

    $query3="SELECT `id` FROM `orders` WHERE `u_id`='$user_id' AND `paid_status`='0' LIMIT $number ";
    $queryData3= mysqli_query($conn, $query3);
    while($dbArray=mysqli_fetch_array($queryData3)){
        $order_id = $dbArray['id'];
        $query2="UPDATE `orders`SET `paid_status`= 1 WHERE  `id`='$order_id' ";
        $queryData2= mysqli_query($conn, $query2);
    }
    header("location:owner.php");
}
?>