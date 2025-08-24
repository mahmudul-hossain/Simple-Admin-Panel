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

?>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All User Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>User-ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Username</th>
              <th>Role</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $dataSelect = "SELECT * FROM user_table NATURAL JOIN user_roles ORDER BY user_id ASC";
            $dataQuery = mysqli_query($connectDatabase, $dataSelect);
            while ($dataFetch = mysqli_fetch_array($dataQuery)) {
            ?>
              <tr>
                <td><?php echo $dataFetch['user_id']; ?></td>
                <td><?= $dataFetch['full_name']; ?></td>
                <td><?= $dataFetch['user_phone']; ?></td>
                <td><?= $dataFetch['user_email']; ?></td>
                <td><?= $dataFetch['user_name']; ?></td>
                <td><?= $dataFetch['user_role_name']; ?></td>
                <td>
                  <?php if ($dataFetch['user_photo'] !== '') { ?>
                    <img height="40" src="upload-images/<?= $dataFetch['user_photo']; ?>" alt="" />
                  <?php } else { ?>
                    <img height="40" src="images/avatar.jpg" alt="" />
                  <?php } ?>
                </td>
                <td>
                  <div class="btn-group btn_group_manage" role="group">
                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">Manage</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="view-user.php?view=<?php echo $dataFetch['user_id']; ?>">View</a>
                      </li>
                      <li><a class="dropdown-item" href="edit-user.php?edit=<?php echo $dataFetch['user_id']; ?>">Edit</a>
                      </li>
                      <li><a class="dropdown-item" href="delete.php?delete=<?php echo $dataFetch['user_id']; ?>">Delete</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
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