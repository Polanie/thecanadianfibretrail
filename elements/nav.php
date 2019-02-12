<div id="banner-logo">
    <div class="logo-placement"></div>
</div><!-- .banner -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">


            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/index.php">Shop Finder</a></li>
            <li class="nav-item"><a class="nav-link" href="/contact.php">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="/guide.php">Purchase Travel Guide</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="users" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Shop Owners</a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <?php
                   if( !empty($_SESSION['user_logged_in']) ){ ?>
                       <a class="dropdown-item" href="/businesses/my-businesses.php">My Businesses</a>
                       <a class="dropdown-item" href="/users/logout.php">Logout</a>
                   <?php }else{ ?>

                       <a class="dropdown-item" href="/users/signin.php">Login In</a>
                       <a class="dropdown-item" href="/users/signup.php">Create new account</a>
                   <?php } ?>



               </div><!-- .dropdown-menu -->
           </li><!-- .nav-item dropdown mr-5-->


        </ul>

      </div>
</nav>
