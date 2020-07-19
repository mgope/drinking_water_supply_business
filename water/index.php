<?php
session_start();
include_once("conn.php");
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $query="INSERT INTO `users`(`name`, `phone`, `password`, `address`) VALUES ('$name', '$phone', '$password', '$address')";
    $queryData= mysqli_query($conn, $query);
    $query2="SELECT `id` FROM `users` WHERE name='$name' AND phone='$phone'  ";
    $queryData2= mysqli_query($conn, $query2);
    $dbArray=mysqli_fetch_assoc($queryData2);
    $_SESSION["id"]=$dbArray['id'];
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-primary">
<div class="m-5">
    <div class="container col-lg-6 col-sm-12 p-4 border border-dark rounded p-3 bg-secondary">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name"class="form-control "  placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="name">Phone:</label>
                <input type="text" name="phone" id="phone"class="form-control"  placeholder="Enter your phone">
            </div>
            <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" name="password" id="password"class="form-control"  placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <input type="text" name="address" id="address"class="form-control"  placeholder="Enter your address">
            </div>
            <div class="form-group">
            <div class="d-flex justify-content-center">
                <div class="button">
                    <input type="submit" value="submit" class="btn btn-primary" name="submit">
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>