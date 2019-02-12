<?php
require_once("../../core/includes.php");

$u = new User;

if( !empty($_POST) ){
    $u->edit();
    header('Location: /users/edit.php');
    exit();
}

$user = $u->get_by_id($_SESSION['user_logged_in']);

$title = 'Edit Profile';
require_once '../../elements/html_head.php';
require_once '../../elements/nav.php';

?>

    <div id="edit-background">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Update Business Information</h2>
                        <form method="post">
                            <div class="form-group">
                                <input class="form-control material-edit-form-group" type="text" name="username" value="<?=$user['username']?>"required>
                                <label>Username</label>
                            </div>
                            <div class="form-group">
                                <input class="form-control material-edit-form-group" type="password" name="password" value"" placeholder="Leave empty to keep same password">
                                <label>Password</label>
                            </div>
                            <div class="form-group">
                                <label>Your Timezone</label>
                                <select class="form-control chosen-select" name="timezone" required>
                                    <option></option>
                                    <?php
                                    $timezone_identifiers = DateTimeZone::listIdentifiers();

                                    foreach( $timezone_identifiers as $timezone ){

                                        $selected = $timezone == $user['timezone'] ? 'selected' : '';

                                        echo '<option value="'.$timezone.'" '.$selected.'>'.$timezone.'</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                                <input class="btn material-btn" type="submit"  value="Update">
                        </form>
                    </div><!-- .col-lg-6-->
                </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #edit-background -->



<?php require_once '../../elements/footer.php';
