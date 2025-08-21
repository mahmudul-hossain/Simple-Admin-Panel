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

$userID=$_GET['view'];
$view="SELECT * FROM user_table NATURAL JOIN user_roles WHERE user_id='$userID'";

$dataQuery= mysqli_query($connectDatabase,$view);
$dataFetch = mysqli_fetch_array($dataQuery);

get_header();
get_sidebar();

?>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>View User Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-striped table-hover custom_view_table">
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?= $dataFetch['full_name']; ?></td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td><?= $dataFetch['user_phone']; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $dataFetch['user_email']; ?></td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td><?= $dataFetch['user_name']; ?></td>
              </tr>
              <tr>
                <td>Role</td>
                <td>:</td>
                <td><?= $dataFetch['user_role_name']; ?></td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>:</td>
                <td>
                  <?php if ($dataFetch['user_photo']!== '') { ?>
                    <img height="250" src="upload-images/<?= $dataFetch['user_photo']; ?>" alt="" />
                  <?php } else { ?>
                    <img height="250" src="images/avatar.jpg" alt="" />
                  <?php } ?>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <div class="card-footer">
        <div class="btn-group" role="group" aria-label="Button group">
          <button type="button" class="btn btn-sm btn-dark">Print</button>
          <button type="button" class="btn btn-sm btn-secondary">PDF</button>
          <button type="button" class="btn btn-sm btn-dark">Excel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

get_footer()

?>