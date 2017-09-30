<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username           = trim($_POST['username']);
        $password           = trim($_POST['password']);
        $confirmPassword    = trim($_POST['confirm-password']);
        $firstname          = trim($_POST['firstname']);
        $lastname           = trim($_POST['lastname']);
        $email              = trim($_POST['email']);
        $birthPlace         = trim($_POST['birth-place']);
        $dateOfBirth        = trim($_POST['date-of-birth']);
        $address            = trim($_POST['address']);
        $city               = trim($_POST['city']);
        $zipCode            = trim($_POST['zip-code']);
        $state              = trim($_POST['state']);
        $date               = date('d-m-y');

        $error = [
            'username'          => '',
            'password'          => '',
            'confirmPassword'   => '',
            'firstname'         => '',
            'lastname'          => '',
            'birth-place'       => '',
            'date-of-birth'     => '',
            'address'           => '',
            'city'              => '',
            'zip-code'          => '',
            'state'             => ''
        ];

        // Username validation
        if(strlen($username) < 4 ) {
            $error['username'] = 'Username needs to be longer than 4 characters.';
        }

        if($username === '' ) {
            $error['username'] = 'Username can not be empty.';
        }

        if(username_exists( $username )) {
            $error['username'] = 'Username ' . $username . ', is already taken.';
        }


        // Password validation
        if($password === $confirmPassword) {

            if($password === '' ) {
                $error['password'] = 'Password can not be empty';
            }

            if($confirmPassword === '' ) {
                $error['confirm-password'] = 'Confirm password can not be empty';
            }

        } else {
            $error['password'] = 'Passwords do not match.';
        }

        // First and Last name validation
        if($firstname === '' ) {
            $error['firstname'] = 'Firstname can not be empty.';
        }

        if($lastname === '' ) {
            $error['lastname'] = 'Lastname can not be empty.';
        }

        // Email validation
        if($email === '' ) {
            $error['email'] = 'Username can not be empty';
        }

        if(email_exists( $email )) {
            $error['email'] = 'Email ' . $email . ', is already taken. <a href="index.php">Please login</a>';
        }

        // Birth Place and Birthday validation
        if($birthPlace === '' ) {
            $error['birth-place'] = 'City where you where born cannot be empty.';
        }

        if($dateOfBirth === '' ) {
            $error['date-of-birth'] = 'Birthday can not be empty.';
        }

        // Address, City, State, Zip Code validation
        if($address === '') {
            $error['address'] = 'Address can not be empty';
        }

        if($city === '') {
            $error['city'] = 'City can not be empty';
        }

        if($state === '') {
            $error['state'] = 'State can not be empty';
        }

        if($zipCode === '') {
            $error['zip-code'] = 'State can not be empty';
        }

        foreach ($error as $key => $value) {
            if(empty($value)) {

                unset($error[$key]);

            }
        } // foreach

        if(empty($error)) {
            register_user($username, $password, $confirmPassword, $firstname, $lastname, $email, $birthPlace, $dateOfBirth, $address, $city, $zipCode, $state, $date);

            login_user($username, $password);

            // echo "<script type='text/javascript'> alertMessageRegistrationSuccess(); </script>";
        }

}

 ?>

<div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <form action="" method="post" enctype="multipart/form-data">

                    <legend class="text-center">Register</legend>

                    <fieldset>

                        <legend>Login Details</legend>
                        <!-- <?php //echo $message; ?> -->
                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <input type="text" name="username" class="form-control" id="username" placeholder="johnny12"
                                    autocomplete='on' value='<?php echo isset($username) ? $username : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['username']) ? $error['username'] : ''; ?></span>
                        </div>

                        <!-- <h5><?php// echo //$passMessage; ?></h5> -->

                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <span class='formErrors'><?php echo isset($error['password']) ? $error['password'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </div>
                                <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                            </div>
                            <span class='formErrors'><?php echo isset($error['confirm-password']) ? $error['confirm-password'] : ''; ?></span>
                        </div>

                        <legend>Account Details</legend>

                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John"
                                    autocomplete='on' value='<?php echo isset($firstname) ? $firstname : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['firstname']) ? $error['firstname'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Doe"
                                    autocomplete='on' value='<?php echo isset($lastname) ? $lastname : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['lastname']) ? $error['lastname'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com"
                                    autocomplete='on' value='<?php echo isset($email) ? $email : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['email']) ? $error['email'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="birth-place">Birth Place</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-repeat"></i>
                                </div>
                                <input type="text" name="birth-place" class="form-control" id="birth-place" placeholder="New York, NY"
                                    autocomplete='on' value='<?php echo isset($birthPlace) ? $birthPlace : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['birth-place']) ? $error['birth-place'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="date-of-birth">Birthday</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <input type="date" name="date-of-birth" class="form-control" id="date-of-birth" placeholder="10/25/15"
                                    autocomplete='on' value='<?php echo isset($dateOfBirth) ? $dateOfBirth : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['date-of-birth']) ? $error['date-of-birth'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-address-card-o"></i>
                                </div>
                                <input type="text" name="address" class="form-control" id="address" placeholder="123 N. Main St."
                                    autocomplete='on' value='<?php echo isset($address) ? $address : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['address']) ? $error['address'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <input type="text" name="city" class="form-control" id="city" placeholder="New York, NY"
                                    autocomplete='on' value='<?php echo isset($city) ? $city : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['city']) ? $error['city'] : ''; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="state">State</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <select class="form-control" id="state" name="state">
                                    <option value="<?php echo isset($state) ? $state : ''; ?>">---</option>
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
                            <span class='formErrors'><?php echo isset($error['state']) ? $error['state'] : ''; ?></span>
                           </div>

                        <div class="form-group col-md-6">
                            <label for="zip-code">Zip Code</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-o"></i>
                                </div>
                                <input type="text" name="zip-code" class="form-control" id="zip-code" placeholder="90210"
                                    autocomplete='on' value='<?php echo isset($zipCode) ? $zipCode : ''; ?>'>
                            </div>
                            <span class='formErrors'><?php echo isset($error['zip-code']) ? $error['zip-code'] : ''; ?></span>
                        </div>

                        <!-- <div class="form-group col-md-6">
                            <label for="image">Profile Image</label>
                            <input type="file" name="image">
                        </div> -->


                    </fieldset>

                    <!-- <fieldset>
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

                    </fieldset> -->

                    <!-- <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="" id="">
                                    I accept the <a href="#">terms and conditions</a>.
                                </label>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name='register' class="btn btn-primary">
                                Register
                            </button>
                            <a href="login.php">Already have an account?</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

<hr>

<?php include 'includes/footer.php'; ?>
