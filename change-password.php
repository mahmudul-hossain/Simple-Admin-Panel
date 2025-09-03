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

// echo ('user-');
// echo time()."-";
// echo rand(100,10000000000);
// echo ('.jpg');

require_once "all_function/functions.php";

needLogin();
get_header();
get_sidebar();

$userID = $_GET['changePassword'];
$dataSelect = "SELECT * FROM user_table WHERE user_id='$userID'";
$dataQuery = mysqli_query($connectDatabase, $dataSelect);
$dataFetch = mysqli_fetch_array($dataQuery);

$password = $dataFetch['password'];

if ($_POST) {
  $oldPassword = md5($_POST['old-password']);
  $newPassword = md5($_POST['new-password']);
  $confirmNewPassword = md5($_POST['confirm-new-password']);

  $updatePassword = "UPDATE user_table SET password='$newPassword' WHERE user_id='$userID'";

  if (!empty($oldPassword)) {
    if (!empty($newPassword)) {
      if (!empty($confirmNewPassword)) {
        if ($newPassword == $confirmNewPassword) {
          if ($password == $oldPassword) {
            if (mysqli_query($connectDatabase, $updatePassword)) {
              header("Location:logout.php");
            } else {
              echo "OPPS! Password Update Failed";
            }
          } else {
            echo "Please Input Correct Old Password";
          }
        } else {
          echo "Password Didn't Match";
        }
      } else {
        echo "Please Input Confirm New Password";
      }
    } else {
      echo "Please Input New Password";
    }
  } else {
    echo "Please Input Old Password";
  }
}

?>

<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>Change Your Password
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Old Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="old-password">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">New Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="new-password">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Confirm New Password<span
                class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="confirm-new-password">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">Update Password</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php

get_footer()

  ?>