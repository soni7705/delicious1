<?php require("../../connection/config.php");

if(isset($_GET['id'])){
$id = $_GET['id'];

$query1 = "SELECT * FROM file_manager where id = $id";
$result = mysqli_query($conn, $query1);
$row = $result->fetch_assoc();
$file_link = $row['file_link'];
$finallink = '../../uploads/.$file_link';
unlink($finallink);

$delete = "DELETE FROM file_manager where id = $id";
$result1 = mysqli_query ($conn, $delete);

if($result1){
    echo "Data is deleted";
    header("Refresh:0; url=../pages/filemanager/manage-file.php");
}

else{
    echo "Data is not deleted";
    // header( "Refresh:0; url=../pages/filemanager/manage-file.php");
}
}
?>