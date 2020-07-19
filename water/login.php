<?php
session_start();
if(isset($_SESSION["id"])){
    header("location:user.php");
}
else{
    include("conn.php");
    if(isset($_POST['login'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $query="SELECT * FROM `users` WHERE name='$name' AND phone='$phone'  ";
            $queryData= mysqli_query($conn, $query);
            $dbArray=mysqli_fetch_assoc($queryData);
            $num_row = mysqli_num_rows($queryData);
            if($num_row==1){
                    $_SESSION['id']=$dbArray['id'];
                        header("location:user.php");
            }
            else
            {
                        header("location:index.php");
                        die();
            }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Name</label><input name="name" class="form-control py-4"  type="text" placeholder="Enter  Name" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Phone</label><input name="phone" class="form-control py-4"  type="text" placeholder="Enter Phone" /></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html"></a><input type="submit" class="btn btn-primary" value="Login" name="login"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src=" https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

    </html>
<?php
}
?>