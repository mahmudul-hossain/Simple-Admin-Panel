<?php

require_once "all_function/functions.php";

$userID=$_GET['delete'];
$delete="DELETE FROM user_table WHERE user_id='$userID'";

if(mysqli_query($connectDatabase,$delete)){
    header("Location:all-user.php");
}

?>