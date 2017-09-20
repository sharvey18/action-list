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

    $query = "INSERT INTO lists (list_title, list_input, user_id) ";
    $query .= "VALUES('{$listTitle}', '{$listItem}', '{$the_user_id}')";

    $lists_query = mysqli_query($connection, $query);
    confirmQuery($lists_query);

  }

 ?>





<form class="container form-horizontal" action='' method='POST'>
  <fieldset>

      <h1>Create a new list</h1>
    	<div class="row">

        <div class="col-md-6">
          <div class="form-group col-md-12">
              <label for="title">Title</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-bolt"></i>
                  </div>
                  <input type="text" name="list_title" class="form-control" id="list_title" placeholder="Safeway">
              </div>
          </div>
        </div>

  	    <div class="col-md-6">
            <div class="form-group col-md-12 multiple-form-group input-group">
              <label for="title">Items</label>
              <div class="input-group">
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
            <button id="create_list" name="create_list" class="btn btn-primary btn-group-justified">Create</button>
          </div>

      </div>



  </fieldset>
</form>

</div>





<?php include 'includes/footer.php'; ?>
