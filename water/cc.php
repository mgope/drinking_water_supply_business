<?php
if(isset($_POST['user_id'])){
    include("conn.php");
    $output="";
    $query="SELECT * FROM `users` WHERE `id`=' " .$_POST["user_id"]." ' ";
    $queryData= mysqli_query($conn, $query);
    $dbArray=mysqli_fetch_assoc($queryData);
    $name=$dbArray['name'];
    $total=$dbArray['unpaid']*25;
    $unpaid=$dbArray['unpaid'];


    $output .='
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-dark table-striped">';
    include("dd.php");
    // $output .='
    //                 <form action="" method="POST">
    //                 <label for="unpaid">Total unpaid:</label>
    //                     <select name="number" id="number">';
    //                     $x=$unpaid;
    //                     for($i=$x; $i>0; $i--){
    // $output .='
    //                     <option value='.$i.'>'.$i.'</option>';
    //                     }
    // $output .='
    //                     </select>
    //                     <br>
    //                     <br>
    //                     <input name="submit" class="btn btn-primary" type="submit" value="Submit">
    //                 </form>
    //                 ';
    $output .='
                </table>
            </div>';
    $output .='
            <div class="col-sm-6">
            <table class="table table-dark table-striped">
    ';


    $output .='
    <tr>
        <td>'.$name.'</td>
    </tr>
    <tr>
        <td>Unpaid:-  '.$unpaid.'</td>
    </tr>
    <tr>
        <td>'.$total.'</td>
    </tr>
    </table>
    </div>
    </div></div>
    ';
}
    echo $output;
    
?>