<?php

require_once "all_function/functions.php";

$userID = $_GET['delete'];
$dataSelect = "SELECT user_photo FROM user_table WHERE user_id='$userID'";
$dataQuery = mysqli_query($connectDatabase, $dataSelect);
$dataFetch = mysqli_fetch_array($dataQuery);

$userPhoto = $dataFetch['user_photo'];

if ($userPhoto !== '') {
    $photoPath = "upload-images/" . $userPhoto;
    if (file_exists($photoPath)) {
        unlink($photoPath);
    }
}

$dataDelete = "DELETE FROM user_table WHERE user_id='$userID'";

if (mysqli_query($connectDatabase, $dataDelete)) {
    header("Location:all-user.php");
}
