<?php

require_once "all_function/functions.php";

$userID=$_GET['delete'];
$dataSelect="DELETE FROM user_table WHERE user_id='$userID'";

if(mysqli_query($connectDatabase,$dataSelect)){
    header("Location:all-user.php");
}

?>