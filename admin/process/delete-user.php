<?php require("../../connection/config.php");

if(isset($_GET['id'])){
$id = $_GET['id'];

$query1 = "SELECT * from users";
$result = mysqli_query($conn, $query1);

$delete = "DELETE from users where id = $id";
$result1 = mysqli_query ($conn, $delete);

if($result1){
    echo "Data is deleted";
    header("Refresh:0; url=../pages/users/manage-users.php");
}

else{
    echo "Data is not deleted";
    header( "Refresh:0; url=../manage-users.php");
}
}
?>