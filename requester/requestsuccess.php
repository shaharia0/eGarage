<?php
session_start();
define('TITLE','Request Success');
define('PAGE','submitRequest');
include ('includes/sidebar.php');
include ('../dbconnection.php');

if (isset($_SESSION['is_login'])){
 $userEmail = $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userlogin.php'</script>";
}
$req = $_SESSION['myid'];
//echo $req;
$sql = "SELECT *  FROM submit_request_db WHERE request_id = $req Limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();

echo "<div class='ml-5 mt-5'>
    <table class='table'>
    <tbody>
    <tr>
       <th> Request Id </th>
       <td>".$row['request_id']."</td>
    </tr>
    <tr>
       <th> Name </th>
       <td>".$row['customer_name']."</td>
    </tr>
    <tr>
       <th> Email ID </th>
       <td>".$row['customer_email']."</td>
    </tr>
    <tr>
       <th> Request Info </th>
       <td>".$row['request_info']."</td>
    </tr>
    <tr>
       <th> Service Description </th>
       <td>".$row['description_info']."</td>
    </tr>
    
    </tbody>
    </table>
    </div>";

}else {
  echo "Failed!";
}
include ('includes/footer.php');
?>