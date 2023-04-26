<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php include 'link/headlink.php' ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="#" class="navbar-brand ml-3" ><span style="color: #000 !important">Cafe</span> <span style="color: #be9c79 !important">House</span></a>
</nav>
<!--stat container-->
<div class="container-fluid" style="margin-top:5px">
  <div class="row"><!--start row-->
    <nav class="col-sm-2 bg-light sidebar py-3"><!-- start sidebar-->
      <div class="sidebar-sticky">
        <ul class="nav flex-column" style="height:100vh">
          <li class="nav-item"><a class="nav-link" href="index.php">
          <i class="fas fa-chalkboard-teacher"> </i>  Dashboard</a></li>
          <li class="nav-item"><a class="nav-link " href="manage_staff.php">
          <i class="fas fa-user-circle"> </i> Manage Staff</a></li>
          <li class="nav-item"><a class="nav-link " href="manage_user.php">
          <i class="fas fa-user"> </i>  Manage User</a></li>
          <li class="nav-item"><a class="nav-link " href="offer.php">
          <i class="fas fa-tags"> </i>  Deals & Offer</a></li>
          <li class="nav-item"><a class="nav-link " href="lib_manage.php">
          <i class="fas fa-book"> </i>  Library</a></li>
          <li class="nav-item"><a class="nav-link " href="manage_menu_a.php">
          <i class="fas fa-list"> </i>  Menu</a></li>
          <li class="nav-item"><a class="nav-link " href="changepwd.php">
          <i class="fas fa-key"> </i>  Change password</a></li>
          <li class="nav-item"><a class="nav-link " href="logout.php">
          <i class="fas fa-sign-out-alt"> </i>  Logout</a></li>
          </ul>
      </div><!--end sidebar-->
    </nav>