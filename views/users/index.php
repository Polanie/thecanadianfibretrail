<?php
require_once '../../core/includes.php';

$u = new User;

$user = $u->get_by_id($_SESSION['user_logged_in']);


$title = 'My Profile';
require_once '../../elements/html_head.php';
require_once '../../elements/nav.php';

?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>My Profile</h2>
                <hr>
                <h2>Username</h2>
                <p><?=$user['username']?></p>
                <h2>Password</h2>
                <p><?=$user['password']?></p>
                <h2>Timezone</2>
                <p><?=$user['timezone']?></p>

                <div class="col-md-6">
                    <h2>Name of Business</h2>
                        <p><?=$businesses['business_name']?></p>
                        <h2>Address</h2>
                        <p><?=$businesses['address']?></p>
                        <h2>City</h2>
                        <p><?=$businesses['city']?></p>
                        <h2>Province</h2>
                        <p><?=$businesses['province']?></p>
                        <h2>Postal Code</h2>
                        <p><?=$businesses['postal_code']?></p>
                        <h2>Phone Number</h2>
                        <p><?=$businesses['phone_number']?></p>
                        <h2>Email</h2>
                        <p><?=$businesses['email']?></p>
                        <h2>Website</h2>
                        <p><?=$businesses['website']?></p>
                    </div>

                <a class="btn btn-primary" href="/users/edit.php">Edit Profile</a>

        </div><!-- .col-sm-6 -->
    </div>


</div><!-- .container -->



<?php require_once '../../elements/footer.php';
