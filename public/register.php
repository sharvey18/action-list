<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>


<?php

if(isset($_POST['register'])) {

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

if($password === $confirmPassword) {
    $passMessage = '';
} else {
    $passMessage = "Passwords must match";
}



if(!empty($username) && !empty($email) && !empty($password)) {

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

    // Password hash
    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));



    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_dob, user_pob, user_address, user_city, user_state, user_zip_code, user_date) ";
    $query .= "VALUES('{$username}','{$password}','{$firstname}','{$lastname}','{$email}', '{$dateOfBirth}', '{$birthPlace}', '{$address}', '{$city}', '{$state}', '{$zipCode}', now())";
    $register_user_query = mysqli_query($connection, $query);
    if(!$register_user_query) {
        die("QUERY FAILED " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }

    $message = "Your registration has been accepted, thank you";

} else {

    $message = "Fields cannot be left empty, very very bad";

}


} else {
    $message = "";
    $passMessage = '';
 }

 ?>

<div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <form role="form" method="POST" action="#">

                    <legend class="text-center">Register</legend>

                    <h4 style="text-align: center;"><?php echo $message; ?></h4>

                    <fieldset>

                        <legend>Login Details</legend>

                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <input type="text" name="username" class="form-control" id="username" placeholder="johnny12">
                            </div>
                        </div>

                        <h5><?php echo $passMessage; ?></h5>

                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </div>
                                <input type="text" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                            </div>
                        </div>

                        <legend>Account Details</legend>

                        <!-- <div class="form-group col-md-6">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" name="" id="first_name" placeholder="First Name">
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Doe">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="birth-place">Birth Place</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-repeat"></i>
                                </div>
                                <input type="text" name="birth-place" class="form-control" id="birth-place" placeholder="New York, NY">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="date-of-birth">Birthday</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <input type="date" name="date-of-birth" class="form-control" id="date-of-birth" placeholder="10/25/15">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card-o"></i>
                                </div>
                                <input type="text" name="address" class="form-control" id="address" placeholder="123 N. Main St.">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <input type="text" name="city" class="form-control" id="city" placeholder="New York, NY">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="state">State</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <select class="form-control" id="state" name="state">
                                    <option value="">---</option>
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

                        <div class="form-group col-md-6">
                            <label for="zip-code">Zip Code</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-o"></i>
                                </div>
                                <input type="text" name="zip-code" class="form-control" id="zip-code" placeholder="90210">
                            </div>
                        </div>


                    </fieldset>

                    <fieldset>
                        <legend>Optional Details</legend>

                        <div class="form-group col-md-6">
                            <label for="country">Country of Residence</label>
                            <select class="form-control" name="" id="country">
                                <option>Country 1</option>
                                <option>Country 2</option>
                                <option>Country 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="found_site">How did you find out about the site?</label>
                            <select class="form-control" name="" id="found_site">
                                <option>Company</option>
                                <option>Friend</option>
                                <option>Colleague</option>
                                <option>Advertisement</option>
                                <option>Google Search</option>
                                <option>Online Article</option>
                                <option value="other" >Other</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 hidden">
                            <label for="specify">Please Specify</label>
                            <textarea class="form-control" id="specify" name=""></textarea>
                        </div>

                    </fieldset>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="" id="">
                                    I accept the <a href="#">terms and conditions</a>.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name='register' class="btn btn-primary">
                                Register
                            </button>
                            <a href="#">Already have an account?</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

<hr>

<?php include 'includes/footer.php'; ?>
