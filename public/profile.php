<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<?php

if(isset($_POST['update_user'])) {
    $update_username       = $_POST['username'];
    $update_user_firstname = $_POST['user_firstname'];
    $update_user_lastname  = $_POST['user_lastname'];
    $update_user_email     = $_POST['user_email'];
    $update_user_dob       = $_POST['user_dob'];
    $update_user_pob       = $_POST['user_pob'];
    $update_user_address   = $_POST['user_address'];
    $update_user_city      = $_POST['user_city'];
    $update_user_state     = $_POST['user_state'];
    $update_user_zip_code  = $_POST['user_zip_code'];

    $the_user_id = $_SESSION['user_id'];

    $query = "UPDATE users SET ";
    $query .= "username = '{$update_username}', ";
    $query .= "user_firstname = '{$update_user_firstname}', ";
    $query .= "user_lastname = '{$update_user_lastname}', ";
    $query .= "user_email = '{$update_user_email}', ";
    $query .= "user_dob = '{$update_user_dob}', ";
    $query .= "user_pob = '{$update_user_pob}', ";
    $query .= "user_address = '{$update_user_address}', ";
    $query .= "user_city = '{$update_user_city}', ";
    $query .= "user_state = '{$update_user_state}', ";
    $query .= "user_zip_code = '{$update_user_zip_code}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $edit_user_profile_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_profile_query);

  }

?>

<?php
	if(isset($_SESSION['user_id'])) {

		$the_user_id = $_SESSION['user_id'];

		$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
		$select_user_profile_query = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_user_profile_query)) {
			$user_id = $row['user_id'];
			$username = $row['username'];
			$user_pass = $row['user_password'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_dob = $row['user_dob'];
			$user_pob = $row['user_pob'];
      $user_address = $row['user_address'];
			$user_city = $row['user_city'];
      $user_state = $row['user_state'];
			$user_zip_code = $row['user_zip_code'];
			$user_date = $row['user_date'];

		}

  }

  ?>



 <div class="container" style="padding-top: 60px;">
 		<h1 class="page-header">Edit Profile</h1>
 		<div class="row">
 			<!-- left column -->
 			<div class="col-md-4 col-sm-6 col-xs-12">
 				<div class="text-center">
 					<img alt="avatar" class="avatar img-circle img-thumbnail" src="http://lorempixel.com/200/200/people/9/">
 					<h6>Upload a different photo...</h6><input class="text-center center-block well well-sm" type="file">
 				</div>
 			</div><!-- edit form column -->
 			<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
 				<!-- <div class="alert alert-info alert-dismissable">
 					<a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-coffee"></i> This is an <strong>.alert</strong>. Use this to show important messages to the user.
 				</div> -->
 				<h3>Personal info</h3>
 				<form class="form-horizontal" role="form" method='POST'>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Username:</label>
                  <div class="col-lg-8">
                     <input class="form-control" type="text" name='username' value="<?php echo $username; ?>">
                  </div>
               </div>
 					<div class="form-group">
 						<label class="col-lg-3 control-label">First name:</label>
 						<div class="col-lg-8">
 							<input class="form-control" type="text" name='user_firstname' value="<?php echo $user_firstname; ?>" style="text-transform: capitalize;">
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="col-lg-3 control-label">Last name:</label>
 						<div class="col-lg-8">
 							<input class="form-control" type="text" name='user_lastname' value="<?php echo $user_lastname; ?>" style="text-transform: capitalize;">
 						</div>
 					</div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Email:</label>
                  <div class="col-lg-8">
                     <input class="form-control" type="text" name='user_email' value="<?php echo $user_email; ?>">
                  </div>
               </div>
 					<div class="form-group">
 						<label class="col-lg-3 control-label">Birthday:</label>
 						<div class="col-lg-8">
 							<input class="form-control" type="text" name='user_dob' value="<?php echo $user_dob; ?>">
 						</div>
 					</div>
          <div class="form-group">
 						<label class="col-lg-3 control-label">Where are you from:</label>
 						<div class="col-lg-8">
 							<input class="form-control" type="text" name='user_pob' value="<?php echo $user_pob; ?>">
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="col-md-3 control-label">Address:</label>
 						<div class="col-md-8">
 							<input class="form-control" type="text" name='user_address' value="<?php echo $user_address; ?>">
 						</div>
 					</div>
               <div class="form-group">
                  <label class="col-md-3 control-label">City:</label>
                  <div class="col-md-8">
                     <input class="form-control" type="text" name='user_city' value="<?php echo $user_city; ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="state" class="col-md-3 control-label">State</label>
               	<div class="col-md-8">
               		<select class="form-control" id="state" name="user_state">
               			<option value=""><?php echo $user_state; ?></option>
               			<option value="AK">Alaska</option>
               			<option value="AL">Alabama</option>
               			<option value="AR">Arkansas</option>
               			<option value="AZ">Arizona</option>
               			<option value="CA">California</option>
               			<option value="CO">Colorado</option>
               			<option value="CT">Connecticut</option>
               			<option value="DC">District of Columbia</option>
               			<option value="DE">Delaware</option>
               			<option value="FL">Florida</option>
               			<option value="GA">Georgia</option>
               			<option value="HI">Hawaii</option>
               			<option value="IA">Iowa</option>
               			<option value="ID">Idaho</option>
               			<option value="IL">Illinois</option>
               			<option value="IN">Indiana</option>
               			<option value="KS">Kansas</option>
               			<option value="KY">Kentucky</option>
               			<option value="LA">Louisiana</option>
               			<option value="MA">Massachusetts</option>
               			<option value="MD">Maryland</option>
               			<option value="ME">Maine</option>
               			<option value="MI">Michigan</option>
               			<option value="MN">Minnesota</option>
               			<option value="MO">Missouri</option>
               			<option value="MS">Mississippi</option>
               			<option value="MT">Montana</option>
               			<option value="NC">North Carolina</option>
               			<option value="ND">North Dakota</option>
               			<option value="NE">Nebraska</option>
               			<option value="NH">New Hampshire</option>
               			<option value="NJ">New Jersey</option>
               			<option value="NM">New Mexico</option>
               			<option value="NV">Nevada</option>
               			<option value="NY">New York</option>
               			<option value="OH">Ohio</option>
               			<option value="OK">Oklahoma</option>
               			<option value="OR">Oregon</option>
               			<option value="PA">Pennsylvania</option>
               			<option value="PR">Puerto Rico</option>
               			<option value="RI">Rhode Island</option>
               			<option value="SC">South Carolina</option>
               			<option value="SD">South Dakota</option>
               			<option value="TN">Tennessee</option>
               			<option value="TX">Texas</option>
               			<option value="UT">Utah</option>
               			<option value="VA">Virginia</option>
               			<option value="VT">Vermont</option>
               			<option value="WA">Washington</option>
               			<option value="WI">Wisconsin</option>
               			<option value="WV">West Virginia</option>
               			<option value="WY">Wyoming</option>
               		</select>
               	</div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label">Zip Code:</label>
                  <div class="col-md-8">
                     <input class="form-control" type="text" name='user_zip_code' value="<?php echo $user_zip_code; ?>">
                  </div>
               </div>

 					<div class="form-group">
 						<label class="col-md-3 control-label">Password:</label>
 						<div class="col-md-8">
 							<input class="form-control" type="password" value="11111122333">
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="col-md-3 control-label">Confirm password:</label>
 						<div class="col-md-8">
 							<input class="form-control" type="password" value="11111122333">
 						</div>
 					</div>
          <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" name='update_user' class="btn btn-primary">
                      Update
                  </button>
              </div>

          </div>
 				</form>
 			</div>
 		</div>
 	</div>

<?php include 'includes/footer.php'; ?>
