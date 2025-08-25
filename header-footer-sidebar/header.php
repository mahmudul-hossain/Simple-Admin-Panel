<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <div class="container-fluid header_part">
      <div class="row">
        <div class="col-md-2 site_logo">
          <img src="images/logo.png" alt="">
        </div>
        <div class="col-md-7"></div>
        <div class="col-md-3 top_right_menu text-end">
          <div class="dropdown">
            <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <!-- <img src="images\avatar.jpg" class="img-fluid"> -->
               <?php 
                  $userPhoto = $_SESSION['user_photo'] != '' ? 'upload-images/' . $_SESSION['user_photo'] : 'images/avatar.jpg';
                ?>
                <img src="<?= $userPhoto ?>" class="img-fluid">
              <?php echo $_SESSION['full_name'];?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="view-user.php?view=<?= $_SESSION['userID'];?>"><i class="fas fa-user-tie"></i> My Profile</a></li>
              <li><a class="dropdown-item" href="edit-user.php"><i class="fas fa-cog"></i> Manage Account</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </header>