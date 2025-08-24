<?php

// $db_host ="localhost";
// $db_user ="root";
// $db_pass ="";
// $db_name ="project_admin_panel";

// $connect =mysqli_connect($db_host,$db_user,$db_pass,$db_name);

// if($connect) {
//     echo "Database Connection Successful";
// }else{
//     echo "Database Connection Failed";
// }

// include_once "database.php";

require_once "all_function/functions.php";
get_header();
get_sidebar();

// include_once "header-footer-sidebar/header.php";
// include_once "header-footer-sidebar/sidebar.php";
// include "header-footer-sidebar/header.php";
// require "header-footer-sidebar/sidebar.php";
// require_once "header-footer-sidebar/sidebar.php";

?>


<div class="row">
    <div class="col-md-12 welcome_part text-center">
        <p><span>Welcome Mr.</span> <?php echo $_SESSION['full_name'];?></p>
        <img src="images\avatar.jpg" class="img-fluid mt-5 border-dark rounded-3">
    </div>
</div>


<?php

// include_once "header-footer-sidebar/footer.php";
get_footer()

?>