<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

  if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if(!$select_user_query) {
      die('Query FAILED'. mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user_query)) {
      $db_user_id = $row['user_id'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];
      $db_user_firstname = $row['user_firstname'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_email = $row['user_email'];
      $db_user_date = $row['user_date'];
    }

    if(password_verify($password, $db_user_password)) {

      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['firstname'] = $db_user_firstname;
      $_SESSION['lastname'] = $db_user_lastname;
      $_SESSION['email'] = $db_user_email;
      $_SESSION['date'] = $db_user_date;

      header('Location: ../new.php');

    } else {

      header('Location: ../index.php');

    }





  }

 ?>
