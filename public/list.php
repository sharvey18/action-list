<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<?php

if(isset($_SESSION['user_id'])) {

    $the_user_id = $_SESSION['user_id'];

   //  $query  = "SELECT user_id ";
   //  $query .= "FROM users ";
   //  $query .= "INNER JOIN lists ON users.user_id = lists.user_id ";
    $query = "SELECT * FROM lists WHERE user_id = $the_user_id ";
    $select_user_list_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user_list_id)) {
      $list_id = $row['list_id'];
      $list_title = $row['list_title'];

      $list_item = $row['list_input'];

      $jsondata = '';
      $arr = json_decode($list_item, true);
      foreach ($arr as $key => $value) {
        $value;
     }

      $user_id = $row['user_id'];
    }



}


 ?>

 <?php

   echo $list_id;

   echo $list_title;

  echo $user_id;

  ?>


<h1>List</h1>



<?php include 'includes/footer.php'; ?>
