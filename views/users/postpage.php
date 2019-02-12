<?php
require_once("../../core/includes.php");
    // unique html head vars
    $title = 'Post Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h4>Business Info</h4>
                <hr>
                <form action="/users/edit.php" method="post">
                <div class="form-group">
                    <label>Business Name</label>
                    <input class="form-control" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" required>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input class="form-control" name="city" type="text" required>
                </div>
                <div class="form-group">
                    <label>Province</label>
                    <input class="form-control" name="province" type="text" required>
                </div>
                <div class="form-group">
                    <label>Postal Code</label>
                    <input class="form-control" name="postal_code" type="text" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone_number" type="text" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" name="email" type="email" required>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input class="form-control" name="website" type="text" required>
                </div>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
            </div><!-- .col-md-6 -->
        </div><!-- .row -->


    </div><!-- .container -->

<?php require_once("../../elements/footer.php");
