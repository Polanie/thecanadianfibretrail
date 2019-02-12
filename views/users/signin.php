<?php
    require_once("../../core/includes.php");

    $title = 'Home Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

    <div class="container">
        <h1>Welcome to The Canadian Fibre Trail</h1>
            <div class="card border-dark mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                        
                            <h4>Sign In</h4>


                                <?=!empty($_SESSION['login_attempt_msg']) ? $_SESSION['login_attempt_msg'] : ''?>
                            <form action="/users/login.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                              <input class="btn btn-primary" type="submit" value="Submit">
                           </form>
                        </div><!-- .col-sm-6 -->
                        <div class="col-sm-6">
                            <h4>Register Today</h4>

                            <p>This website is setup for fibre artists who travel our beautiful province and want the opportunity to see all the wonderful
                                fibres and the places that make, dye or the merchandise.  You can register for free on this site so that people can see
                                where you are and what you have in store. </p>
                            <p>If you sign up as a premium client and pay the monthly fee you have the opportunity to add sales, classes or events to your
                               account information so that the travellers can see what is happening currently in your shop or studio.  </p>
                               <a href="/users/signup.php" type="submit" value="Create new account">Create a new Account</a>
                        </div><!-- .col-sm-6 -->
                    </div><!-- .row -->
                </div><!-- .card-body -->
            </div><!-- .card -->

    </div><!-- .container-->



<?php require_once("../../elements/footer.php");
