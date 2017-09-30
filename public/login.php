<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<?php

  if(isset($_POST['login'])) {

    login_user($_POST['username'],$_POST['password']);

  }

 ?>


<?php include 'includes/footer.php'; ?>
