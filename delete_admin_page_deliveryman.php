<!--<h1>delete_admin_page_deliveryman.php</h1>-->
<?php

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");

$sl = $_GET['dsl'];

$query = "DELETE FROM deliveryman WHERE sl = '$sl'";

$data = mysqli_query($con, $query);

if($data){
    echo "<script> alert('Record Delete From Database SuccessFully') </script>"; 
    
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/adminpage.php ">
<?php
    
}else{
    echo "<script> alert('Failed To Delete') </script>"; 
    
 ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/adminpage.php ">
<?php

}

?>
