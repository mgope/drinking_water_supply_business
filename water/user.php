<?php
session_start();
if(!isset($_SESSION["id"])){
    header("location:login.php");
}
include("conn.php");
$u_id=$_SESSION["id"];
$query3="SELECT * FROM `users` WHERE `id`='$u_id'";
$queryData3= mysqli_query($conn, $query3);
$dbArray=mysqli_fetch_assoc($queryData3);
$total=$dbArray['unpaid'];
$total_amount=$total*25;
if(isset($_POST['submit'])){
    $date=date('d.m.yy');
    $d_id=1;
    $query="UPDATE `users`SET `unpaid`=`unpaid`+1 WHERE `id`='$u_id'";
    $queryData= mysqli_query($conn, $query);
    $query2="INSERT INTO `orders`(`date`,`u_id`,`d_id`) VALUES ('$date','$u_id','$d_id')";
    $queryData2= mysqli_query($conn, $query2);
    header("location:user.php");
}
$query="SELECT * FROM `orders` WHERE `u_id`='$u_id' ";
$queryData= mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-primary ">
    <div class="d-flex justify-content-center mt-5 col-md-12 col-xs-12">
        <div class="button">
            <div class="mx-auto"></div>
            <form action="" method="post" class="d-flex justify-content-center ">
                <button type="submit" name="submit"><img src="images/water.jpg" alt="Icon" width="100" height="100" ></button>
            </form>
            <label for="user" class="text-white d-flex justify-content-center "><h2><?php echo $dbArray['name']; ?></h2></label>
            <hr>
            <label for="total" class="text-white d-flex justify-content-center ">Your Total unpaid order is: <?php echo $dbArray['unpaid']; ?> </label>
            <br>
            <label for="total" class="text-white d-flex justify-content-center ">Your Total amount is: <?php echo $total_amount; ?> </label>
            <hr>
            <?php
            while($dbArray2=mysqli_fetch_assoc($queryData)){
            ?>
            <div class="containor d-flex justify-content-center ">
                <div class="row">
                    <div class="col-xm-6">
                        <label for="orders" class="text-white"><?php echo $dbArray2['date']; ?></label>
                        <br>                    
                    </div>
                    <div class="col-xm-6">
                        <label for="unpaid" >
                            <?php
                            if($dbArray2['paid_status']==1){
                            ?>
                                <span class="text-success">&nbsp Paid</span>
                            <?php
                            }
                            else{
                            ?>
                            <span class="text-white">&nbsp Unpaid</span>
                            <?php
                            }
                            ?>
                        </label>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

            <a href="logout.php" class="text-white btn btn-danger d-flex justify-content-center ">Log-out</a>
        </div>
    </div>
    <br>
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>