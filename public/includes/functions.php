<?php

function redirect($location) {

  return header("Location:" . $location);

}

function confirmQuery($result) {
  global $connection;
  if(!$result) {
    die("QUERY FAILED " . mysqli_error($connection));
  }
}

function username_exists( $username ) {

  global $connection;

  $query = "SELECT username FROM users WHERE username = '$username'";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);

  if(mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }

}

function email_exists( $email ) {

  global $connection;

  $query = "SELECT user_email FROM users WHERE user_email = '$email'";
  $result = mysqli_query($connection, $query);
  confirmQuery($result);

  if(mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }

}

function register_user($username, $password, $confirmPassword, $firstname, $lastname, $email, $birthPlace, $dateOfBirth, $address, $city, $zipCode, $state, $date) {

  global $connection;

  $username           = $_POST['username'];
  $password           = $_POST['password'];
  $confirmPassword    = $_POST['confirm-password'];
  $firstname          = $_POST['firstname'];
  $lastname           = $_POST['lastname'];
  $email              = $_POST['email'];
  $birthPlace         = $_POST['birth-place'];
  $dateOfBirth        = $_POST['date-of-birth'];
  $address            = $_POST['address'];
  $city               = $_POST['city'];
  $zipCode            = $_POST['zip-code'];
  $state              = $_POST['state'];
  $date               = date('d-m-y');

  // Clean up the values with real_escape
  $username           = mysqli_real_escape_string($connection, $username);
  $password           = mysqli_real_escape_string($connection, $password);
  $confirmPassword    = mysqli_real_escape_string($connection, $confirmPassword);
  $firstname          = mysqli_real_escape_string($connection, $firstname);
  $lastname           = mysqli_real_escape_string($connection, $lastname);
  $email              = mysqli_real_escape_string($connection, $email);
  $birthPlace         = mysqli_real_escape_string($connection, $birthPlace);
  $dateOfBirth        = mysqli_real_escape_string($connection, $dateOfBirth);
  $address            = mysqli_real_escape_string($connection, $address);
  $city               = mysqli_real_escape_string($connection, $city);
  $zipCode            = mysqli_real_escape_string($connection, $zipCode);
  $state              = mysqli_real_escape_string($connection, $state);
  $date               = mysqli_real_escape_string($connection, $date);

  // Password hash
  $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

  $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_dob, user_pob, user_address, user_city, user_state, user_zip_code, user_date) ";
  $query .= "VALUES('{$username}','{$password}','{$firstname}','{$lastname}','{$email}', '{$dateOfBirth}', '{$birthPlace}', '{$address}', '{$city}', '{$state}', '{$zipCode}', now() ) ";
  $register_user_query = mysqli_query($connection, $query);
  confirmQuery($register_user_query);

}

function login_user($username, $password) {

  global $connection;

  $username = trim($username);
  $password = trim($password);

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);

  confirmQuery($select_user_query);

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

    redirect("/new.php");

  } else {

    redirect("/index.php");

  }

}

function shareList($username, $list_id) {

  global $connection;

  $query = 'SELECT username FROM users';
  $select_username_query = mysqli_query($connection, $query);
  confirmQuery($select_username_query);

  while($row = mysqli_fetch_array($select_username_query)) {
    $username = $row['username'];
  }

  

  // $query = "SELECT list_id FROM lists";
  // $select_list_id_query = mysqli_query($connection, $query);
  // confirmQuery($select_list_id_query);
  //
  // while($row = mysqli_fetch_array($select_list_id_query)) {
  //   echo $list_id = $row['list_id'];
  // }


}




 ?>
