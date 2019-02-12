<?php require_once("../../core/includes.php");

    // unique html head vars
    $title = 'My Businesses';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");


?>

    <div class="container">
        <div  class="row">
            <div class="col-md-6">
                <h4 class="mt-4" id="show-business-form-btn">Add a Business <i class="fas fa-plus"></i> </h4>
                <hr>
                <form id="add-business-form" action="/businesses/add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <img id="img-preview" class="mb-4" src="/assets/images/default-business-photo.jpg">
                        <input id="file-with-preview" type="file" name="fileToUpload" onchange="previewFile()">
                    </div>
                    <div class="form-group">
                        <label>Business Name</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" required>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <?php
                        echo '<select id="province-select-dropdown" class="form-control" name="province" required>';
                            foreach($provincesArr as $prCode => $province){
                                echo '<option value="'.$prCode.'">'.$province.'</option>';
                            }
                        echo '</select>';

                        ?>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <div id="cities-dropdowns">

                            <?php
                            foreach($citiesArr as $prCode => $cities){
                                echo '<select class="form-control city-dropdowns" name="city" required>';
                                foreach($cities as $city){
                                    echo '<option>'.$city.'</option>';
                                }
                                echo '</select>';
                                break;
                            }
                            ?>

                        </div><!-- #cities-dropdowns -->
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
                        <input class="form-control" name="website" type="text">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div><!-- .col-md-6 -->

        </div><!-- .row -->


        <div class="business-display">

                <div class="row">

                    <?php
                    $b = new Business;
                    $businesses = $b->get_all_by_user_id($_SESSION['user_logged_in']);

                    foreach($businesses as $business){ ?>

                        <div class="business-display-field" class="col-md-6">
                            <?php
                            if( !empty($business['filename']) ){
                                echo '<img class="img-fluid" src="/assets/files/'.$business['filename'].'">';
                            }else{
                                echo '<img class="img-fluid" src="/assets/images/default-business-photo.jpg">';
                            }
                            //This is to have the image have a place to go and have a default picture if they wish to add information.
                            ?>

                            <h3><?=$business['name']?></h3>
                            <p>
                                <?=$business['address']?><br>
                                <?=$business['city']?><br>
                                <?=$business['province']?><br>
                                <?=$business['postal_code']?><br>
                                <?=$business['phone_number']?><br>
                                <?=$business['email']?><br>
                                <a href="<?=$business['website']?>"><?=$business['website']?></a>
                            </p>
                            <p><a href="/businesses/edit.php?id=<?=$business['id']?>">Edit Business</a></p>
                            <p><a class="delete-btn" aria-hidden="true" href="/businesses/delete.php?id=<?=$business['id']?>">Delete Business</a></p>


                        </div>
                <?php } ?>
            </div><!-- .row-->

        </div><!-- .business-display-->
    </div><!-- .container -->

<?php require_once("../../elements/footer.php");
