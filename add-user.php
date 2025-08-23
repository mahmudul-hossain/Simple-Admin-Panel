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

if (!empty($_POST)) {
  $full_name = $_POST['full-name'];
  $user_phone = $_POST['user-phone'];
  $user_email = $_POST['user-email'];
  $user_name = $_POST['user-name'];
  // $password = $_POST['password'];
  $password = md5($_POST['password']);
  // $confirm_password= $_POST['confirm-password'];
  $confirm_password = md5($_POST['confirm-password']);
  $user_role = $_POST['user-role'];
  $user_photo = $_FILES['user-photo'];
  $user_photo_name = '';
  
  if ($user_photo['name']!=''){
    $user_photo_name = 'user-'.time().'-'.rand(1000,1000000000).'.'.pathinfo($user_photo['name'],PATHINFO_EXTENSION);
  }
  $insert = "INSERT INTO  user_table(full_name,user_phone,user_email,user_name,password,confirm_password,user_role_id,user_photo)VALUES('$full_name','$user_phone','$user_email','$user_name','$password','$confirm_password','$user_role','$user_photo_name')";

  if ($password == $confirm_password) {
    if (mysqli_query($connectDatabase, $insert)) {
      move_uploaded_file($user_photo['tmp_name'], 'upload-images/'.$user_photo_name);
      header("Location:all-user.php");
    } else {
      echo "User Registration Failed";
    }
  } else {
    echo "Confirm Password Doesn't Match";
  }
}

get_header();
get_sidebar();

?>

<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>User Registration
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="full-name" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Phone<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="user-phone" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control form_control" id="" name="user-email" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="user-name" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="password" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="confirm-password" required>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" id="" name="user-role" required>
                <option>Select Role</option>
                <?php
                  $dataSelect = "SELECT * FROM user_roles ORDER BY user_role_id ASC";
                  $roleDataQuery = mysqli_query($connectDatabase, $dataSelect);
                  while ($roleDataFetch = mysqli_fetch_array($roleDataQuery)) {
                ?>
                
                <option value="<?= $roleDataFetch['user_role_id']; ?>"><?= $roleDataFetch['user_role_name']; ?></option>
                  
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="user-photo">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php

get_footer()

?>