<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<?php

  $the_user_id = $_SESSION['user_id'];

  if(isset($_POST['create_list'])) {

    $listTitle = $_POST['list_title'];

    $array = [];
    foreach($_POST['list_item'] as $key => $value) {
      $array[$key] = $value;
    }
    $listItem = json_encode($array);

    if(!empty($listTitle) && !empty($listItem)) {

      // Clean up the data
      $listTitle = mysqli_real_escape_string($connection, $listTitle);
      $listItem = mysqli_real_escape_string($connection, $listItem);

      $query = "INSERT INTO lists (list_title, list_input, list_date, user_id) ";
      $query .= "VALUES('{$listTitle}', '{$listItem}', now(), '{$the_user_id}')";

      $lists_query = mysqli_query($connection, $query);
      confirmQuery($lists_query);

      // $message = "";
      // echo "<script type='text/javascript'> alertMessageNewListSuccess(); </script>";

      header('Location: list.php');
    } else {
      // $message = "";
      echo "<script type='text/javascript'> alertMessageNewListFail(); </script>";
    }
  }

 ?>

<form class="container" action='' method='POST'>
  <fieldset>

      <h1>Create a new list</h1>
      <!-- <?php //echo $message; ?> -->
    	<div class="row">

        <div class="col-md-6">
          <div class="form-group form-group-lg col-md-12">
              <label for="title">Title</label>
              <div class="input-group input-group-lg">
                  <div class="input-group-addon">
                      <i class="fa fa-bolt"></i>
                  </div>
                  <input type="text" name="list_title" class="form-control" id="list_title" placeholder="Safeway">
              </div>
          </div>
        </div>

  	    <div class="col-md-6">
            <div class="form-group form-group-lg col-md-12">
              <label for="title">Items</label>
              <div class="input-group input-group-lg">
                <?php
                  $limit = 1;
                    for ($i = 1; $i <= $limit; $i++) { ?>
                      <input type="text" name="list_item[<?php $i; ?>]" class="form-control" placeholder='Add New'>
                  <?php } ?>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-add">+</button>
                </span>
              </div>
            </div>
        </div>

          <!-- Button -->
          <div class="col-md-12">
            <button id="create_list" name="create_list" class="btn btn-primary btn-block btn-lg">Create</button>
          </div>

      </div>



  </fieldset>
</form>





<?php include 'includes/footer.php'; ?>
