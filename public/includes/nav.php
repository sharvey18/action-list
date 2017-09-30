<div class="container-fluid main-nav">
    <!-- Second navbar for sign in -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="/"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>

            <?php if (isset($_SESSION['username'])) { ?>

                <li><a href="new.php">New</a></li>
                <li><a href="list.php">List</a></li>

                <li>
                    <a href="logout.php" class="btn btn-default btn-circle navBtn">Sign Out</a>
                </li>
                <li>
                    <a href="profile.php" id='loggedInUser'>Welcome:
                        <?php
                            if(isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            }
                         ?>
                    </a>
                </li>

            <?php } else { ?>

                <li>
                    <a href='register.php'>Register</a>
                </li>

                <li>
                    <a href='forgot-password.php'>Forgot Password</a>
                </li>

                <li>
                    <a class="btn btn-primary btn-circle navBtn"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
                </li>

            <?php } ?>




          </ul>
          <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form" action='login.php' method='post'>
              <div class="form-group">
                <label class="sr-only" for="username">Email</label>
                <input type="text" class="form-control" name="username" placeholder="username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required />
              </div>
              <button type="submit" name="login" class="btn btn-success">Sign in</button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
