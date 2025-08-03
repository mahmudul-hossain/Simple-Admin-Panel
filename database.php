<?php

    $db_host ="localhost";
    $db_user ="root";
    $db_pass ="";
    $db_name ="project_admin_panel";

    $connect =mysqli_connect($db_host,$db_user,$db_pass,$db_name);

    if(!$connect) {
        echo "Database Connection Failed";
    }
    
    // if($connect) {
    //     echo "Database Connection Successful";
    // }else{
    //     echo "Database Connection Failed";
    // }

?>