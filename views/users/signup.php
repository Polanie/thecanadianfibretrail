<?php  require_once("../../core/includes.php");
    // unique html head vars

    $title = 'My Profile';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

<div class="container">
    
    <div class="row">
        <div class="col-sm-6">
            <h2>Create New Account</h2>
            <?= !empty($_SESSION['create_acc_msg']) ? $_SESSION['create_acc_msg'] : '' ?>
            <form action="/users/add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control material-type" type="username" name="username" required>
                </div>
                <div class="form-group material-form-group ty">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Your Timezone</label>
                    <select id="signup-timezone-select" class="form-control" name="timezone" required>
                        <option></option>
                        <?php
                        $timezone_identifiers = DateTimeZone::listIdentifiers();
                        foreach( $timezone_identifiers as $timezone ){
                            echo '<option value="'.$timezone.'">'.$timezone.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" value="Submit">



        </div><!-- .col-sm-6 -->
    </div><!-- .row -->
</div><!-- .container -->




<?php require_once("../../elements/footer.php");
