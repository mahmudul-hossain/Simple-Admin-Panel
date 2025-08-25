<?php session_start();

include_once('database.php');

function get_header()
{
    include_once "header-footer-sidebar/header.php";
}
function get_sidebar()
{
    include_once "header-footer-sidebar/sidebar.php";
}
function get_footer()
{
    include_once "header-footer-sidebar/footer.php";
}

function loginID(){
    return isset($_SESSION['userID'])? true:false;
}

function needLogin(){
    $checkUserID=loginID();
    if (!$checkUserID){
        header("Location:login.php");
        exit();
    }
}