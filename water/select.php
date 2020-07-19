<?php
if(isset($_POST['user_id'])){
    $user_id=$_POST['user_id'];
}
include("conn.php");
$query="SELECT * FROM `users` WHERE `id`=' " .$_POST["user_id"]." ' ";
$queryData= mysqli_query($conn, $query);
$dbArray=mysqli_fetch_assoc($queryData);
$u_id=$dbArray['id'];
$name=$dbArray['name'];
$total=$dbArray['unpaid']*25;
$unpaid=$dbArray['unpaid'];
if(isset($_POST['submit'])){
    $y=$_POST['number'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.js"></script>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-dark table-striped">
                <form action="pay.php" method="POST">
                    <label for="unpaid">Total unpaid:</label>
                        <select name="number" id="number">
                        <?php
                        $x=$unpaid;
                        for($i=$x; $i>0; $i--){
                        ?>
                        <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                        <br>
                        <br>
                        <input name="submit" class="btn btn-primary submit" type="submit" value="Submit">
                    </form>
                    </table>
            </div>
            <div class="col-sm-6">
            <table class="table table-dark table-striped">
                <tr>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td><?php echo $unpaid; ?></td>
                </tr>
                <tr>
                    <td><?php echo $total; ?></td>
                </tr>
            </table>
            </div>
        </div>
</div>
<script>
// $(document).ready(function(){
//     $(".submit").click(function(){
//         var number = $("#number").val();
//         var user_id = "<?php echo $user_id; ?>";
//         $.ajax({
//             url:"pay.php",
//             method:"post",
//             data:{
//                 user_id:user_id,
//                 number:number
//                 },
//             success:function(data){
//                 alert(number);
//             }
//     alert(total_pay);
//     });
// });
$(document).ready(function(){
    $(".submit").click(function(){
        var result = confirm("sure, want to pay");
        if(result == true){
            var number = $("#number").val();
            var user_id = "<?php echo $user_id; ?>";
            $.ajax({
                url:"pay.php",
                method:"post",
                data:{
                    number:number,
                    user_id:user_id
                },
                success:function(data){
                    location.reload();
                }
            });
        }
        else{
                    location.reload();
        }
    });
});

</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>