<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../lib/session.php"; ?>
<?php
$db = new Database();
?>
<?php
session::init();
if ($_SESSION["username"] == "" && $_SESSION["password"] == "") {
  header("Location:login.php");
}
?>
<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
  session::destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="">CSE 9</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a href="?action=logout" class="nav-link" style="text-decoration:none;">Logout</a>
          </li>
        </ul>
      </div>
      <div>
        <a href="?action=logout" class="d-flex justify-content-center btn btn-secondary">Log Out</a>
      </div>
    </nav>