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

$userID=$_GET['edit'];
$dataSelect="SELECT * FROM user_table WHERE user_id='$userID'";
$dataQuery= mysqli_query($connectDatabase,$dataSelect);
$dataFetch = mysqli_fetch_array($dataQuery);

if (!empty($_POST)) {
  $full_name = $_POST['full-name'];
  $user_phone = $_POST['user-phone'];
  $user_email = $_POST['user-email'];
  $user_name = $_POST['user-name'];
  $user_role = $_POST['user-role'];
  $user_photo = $_FILES['user-photo'];
  $user_photo_name = '';
  
  if ($user_photo['name']!=''){
    $user_photo_name = 'user-'.time().'-'.rand(1000,1000000000).'.'.pathinfo($user_photo['name'],PATHINFO_EXTENSION);
  }
  $update = "UPDATE  user_table SET full_name='$full_name',user_phone='$user_phone',user_email='$user_email', user_name='$user_name' WHERE user_id='$userID'";

    if (mysqli_query($connectDatabase, $update)) {
      move_uploaded_file($user_photo['tmp_name'], 'upload-images/'.$user_photo_name);
      header("Location:all-user.php");
    } else {
      echo "User Registration Failed";
    }
}

get_header();
get_sidebar();

?>

<div class="row">
  <div class="col-md-12 ">
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>Update User Information
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
              <input type="text" class="form-control form_control" id="" name="full-name" value="<?= $dataFetch['full_name']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="user-phone" value="<?= $dataFetch['user_phone']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control form_control" id="" name="user-email" value="<?= $dataFetch['user_email']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="user-name" value="<?= $dataFetch['user_name']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" id="" name="user-role">
                <option>Select Role</option>

                <?php
                  $dataSelect = "SELECT * FROM user_roles ORDER BY user_role_id ASC";
                  $roleDataQuery = mysqli_query($connectDatabase, $dataSelect);
                  while ($roleDataFetch = mysqli_fetch_array($roleDataQuery)) {
                ?>
                
                <option value="<?= $roleDataFetch['user_role_id']; ?>"<?php if($roleDataFetch['user_role_id']==$dataFetch['user_role_id']){echo 'selected';}?>><?= $roleDataFetch['user_role_name']; ?></option>
                  
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="user-photo">
            </div>
            <div class="col-md-2">
              <?php if ($dataFetch['user_photo']!== '') { ?>
                <img height="75" src="upload-images/<?= $dataFetch['user_photo']; ?>" alt="" />
              <?php } else { ?>
                <img height="75" src="images/avatar.jpg" alt="" />
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php

get_footer()

?>