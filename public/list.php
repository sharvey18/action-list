<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<div class="container text-center">
<h1>Lists</h1>
</div>





<?php

if(isset($_POST['delete_list'])) {

   $the_user_id = $_SESSION['user_id'];
   $query = "SELECT list_id FROM lists WHERE user_id = $the_user_id ";
   $select_user_list_id_delete = mysqli_query($connection, $query);
   confirmQuery($select_user_list_id_delete);

   while($row = mysqli_fetch_assoc($select_user_list_id_delete)) {
      $list_id = $row['list_id'];
   }

   $the_users_list_id = $list_id;
   global $list_id;
   $query = "DELETE FROM lists WHERE list_id = $the_users_list_id ";
   $delete_user_list = mysqli_query($connection, $query);
   confirmQuery($delete_user_list);

   echo "<script type='text/javascript'> alertDeleteList(); </script>";

}



if(isset($_POST['share_list'])) {

   $shareList = $_POST['shareUsername'];
   $currentUser = $_SESSION['user_id'];

   global $list_id;

   $query = "SELECT * FROM lists WHERE user_id = {$currentUser} ";
   $select_user_list_id_share = mysqli_query($connection, $query);

   confirmQuery($select_user_list_id_share);

   while($row = mysqli_fetch_assoc($select_user_list_id_share)) {
      $list_id = $row['list_id'];
      $list_title = $row['list_title'];
      // $listItem = json_encode($array);
      $list_item = $row['list_input'];
      // $list_item = json_decode( $list_item, $assoc_array = true );
      $list_date = $row['list_date'];
      $user_id = $row['user_id'];

   }

   $query = "INSERT INTO lists (list_title, list_input, list_date, user_id ) ";
   $query .= "VALUES( '{$list_title}', '{$list_item}', '{$list_date}', '{$shareList}') ";
   $insert_shared_list = mysqli_query($connection, $query);

   confirmQuery($insert_shared_list);

}

?>

<?php

if(isset($_SESSION['user_id'])) {

    $the_user_id = $_SESSION['user_id'];
   //  $query = "SELECT * FROM lists WHERE user_id = $the_user_id ORDER BY list_id DESC ";
    $query = "SELECT * FROM lists NATURAL JOIN users WHERE user_id = $the_user_id ORDER BY list_id DESC ";
    $select_user_list_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user_list_id)) {
      // echo $user_id = $row['user_id'];
      $username = $row['username'];

      $list_id = $row['list_id'];
      $list_title = $row['list_title'];
      $list_item = $row['list_input'];
      $list_item = json_decode( $list_item, $assoc_array = false );
      $list_date = $row['list_date'];
      $user_id = $row['user_id'];

      global $list_id;

      ?>

      <!-- List forms -->
      <form class="container form-horizontal" action='' method='POST'>
        <fieldset>
           <div class="row">
             <div class="col-md-12">
               <h3 style='text-transform: capitalize;'><?php echo $list_title; ?></h3>
               <h5><?php echo $list_date; ?></h5>
                  <div class="input-group" style='width: 100%;' id='list' data-id='<?php echo $list_id; ?>'>
                    <?php foreach ($list_item as $items) { ?>
                     <div class="input-group input-group-lg" style='margin: 1rem 0;'>
                        <input type='text' id='list-item' name='list_item' value='<?php echo $items; ?>' class='form-control input-lg'>
                        <span class="input-group-btn">
                           <button type="button" class="btn btn-success" id='strike-btn'>
                              <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i>
                           </button>
                        </span>
                     </div>
                   <?php } ?>
                  </div>
              </div>

              <div class="col-md-12">

                 <!-- Button -->
                 <div class="col-md-6 col-sm-12">
                   <button id="delete_list" name="delete_list" class="btn btn-primary btn-lg">Delete List</button>
                 </div>

                 <div class="col-md-6 col-sm-12">
                    <form class="pull-right shareing_list" action="" method="POST">

                       <div class="form-group">
                          <label>Select Username to share <span style='text-transform: capitalize;'><?php echo $list_title; ?></span> with</label>
                          <div class="input-group">
                             <select class="input-lg" id="users" name="shareUsername">
                               <?php

                                   $query = 'SELECT * FROM users';
                                   $select_username_query = mysqli_query($connection, $query);
                                   confirmQuery($select_username_query);

                                   while($row = mysqli_fetch_array($select_username_query)) {
                                      $user_id = $row['user_id'];
                                      $username = $row['username'];

                                      echo "<option value='$user_id'>{$username}</option>";

                                   }

                               ?>
                             </select>

                             <button id='share_list' type="submit" name="share_list" class="btn btn-primary btn-lg"> Share </button>
                          </div>

                       </div>


                    </form>

                 </div>

              </div>

            </div>
        </fieldset>
      </form>

      <?php } ?>



   <?php } ?>






<?php include 'includes/footer.php'; ?>
