<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<section>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active" style="background: url('/images/cart.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Demand to be let outside at once, and expect owner to wait for me as i think about it wack the mini furry mouse</h3>
          <p>Give me attention or face the wrath of my claws i am the best have secret plans human is washing you why halp oh the horror flee scratch hiss bite</p>
        </div>
      </div>
      <div class="item" style="background: url('/images/market.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Throw down all the stuff in the kitchen lay on arms while you're using the keyboard meow all night</h3>
          <p>Mice plan steps for world domination paw at beetle and eat it before it gets away claw at curtains stretch and yawn nibble on tuna ignore human bite human hand</p>
        </div>
      </div>
      <div class="item" style="background: url('/images/laundry.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Chase laser eat grass, throw it back up</h3>
          <p>Lick face hiss at owner, pee a lot, and meow repeatedly scratch at fence purrrrrr eat muffins and poutine until owner comes back hack up furballs leave fur on owners clothes</p>
        </div>
      </div>
      <div class="item" style="background: url('/images/dishes.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Chase laser eat grass, throw it back up</h3>
          <p>Lick face hiss at owner, pee a lot, and meow repeatedly scratch at fence purrrrrr eat muffins and poutine until owner comes back hack up furballs leave fur on owners clothes</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<section class='layout'>
  <div class="container">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-md-4 text-center">
        <i class="fa fa-plus fa-5x" aria-hidden="true"></i>
        <h2>Add New List</h2>
        <p>Create a new list and never forget anything again.</p>
        <?php
        if(isset($_SESSION['username'])) {
          echo "<a class='btn btn-primary' href='/new.php'>Add New</a>";
        } else {
          echo "<a class='btn btn-primary' href='/index.php'>Add New</a>";
        }
        ?>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-list fa-5x" aria-hidden="true"></i>
        <h2>View All Lists</h2>
        <p>View, share and delete your list on the fly.</p>
        <?php
        if(isset($_SESSION['username'])) {
          echo "<a class='btn btn-primary' href='/list.php'>View Lists</a>";
        } else {
          echo "<a class='btn btn-primary' href='/index.php'>View Lists</a>";
        }
        ?>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-user fa-5x" aria-hidden="true"></i>
        <h2>Your Profile</h2>
        <p>Manage your profile and keep it current.</p>
        <p>
          <?php
          if(isset($_SESSION['username'])) {
            echo "<a class='btn btn-primary' href='/profile.php'>Edit Profile</a>";
          } else {
            echo "<a class='btn btn-primary' href='/index.php'>Edit Profile</a>";
          }
          ?>
        </p>
      </div>
    </div><!-- /.row -->
  </div>
</section>

<section>
  <div class="jumbotron jumbotron-fluid" style='background-color: #011627; color: white;'>
    <div class="container">
      <h1 class="text-center">NEVER FORGET ANYTHING AGAIN</h1>
      <p class="text-center">Forget paper to pen when you can have every list in your pocket.</p>
    </div>
  </div>
</section>




<?php include 'includes/footer.php'; ?>
