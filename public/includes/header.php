<?php include 'db.php'; ?>
<?php include 'functions.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  session_unset();
  session_destroy();
  header("Location: index.php");
}
$_SESSION['LAST_ACTIVITY'] = time();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Action List</title>
    <script src="https://use.fontawesome.com/b742568ef9.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">
    <link rel="stylesheet" href="/sass/app.min.css">
  </head>
  <body>
