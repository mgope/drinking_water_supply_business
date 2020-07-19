<?php
include("conn.php");
$query3="SELECT * FROM `users`";
$queryData3= mysqli_query($conn, $query3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.js"></script>
</head>
<body>
<div class="container">
    <h2>Customer Table</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Unpaid</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($dbArray=mysqli_fetch_assoc($queryData3)){
        ?>
        <tr>
            <td><button type="button" class="btn btn-primary user_model" data-toggle="modal" data-target="#myModal"  id="<?php echo $dbArray['id'] ?>"><?php echo $dbArray['name'] ?></button></td>
            <td><?php echo $dbArray['unpaid'] ?></td>
            <td>₹  <?php echo $dbArray['unpaid']*25 ?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">


                <h4 class="modal-title">Pay amount ₹</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" id="user_detail">
                Modal body..
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            </div>
        </div>
    
    

</div>
<!-- <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><?php echo $dbArray['name'] ?></button> -->
<script>
$(document).ready(function(){
    $(".user_model").click(function(){
        var user_id = $(this).attr("id");
        $.ajax({
            url:"select.php",
            method:"post",
            data:{
                user_id:user_id,
                },
            success:function(data){
                $('#user_detail').html(data);
            }
        });
    });
});
</script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>