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
                <form action="" method="GET">
                    <label for="unpaid">Total unpaid:</label>
                        <select name="number" id="number">
                        <?php
                        $x=9;
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
            </table>
        </div>
</div>
<script>
$(document).ready(function(){
    $(".submit").click(function(){
        var number = $("#number").val();
        alert(number);
    });
});
</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>