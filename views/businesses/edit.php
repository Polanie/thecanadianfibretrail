<?php  require_once("../../core/includes.php");


    if( !empty($_GET['id']) ){

        $b = new Business;
        $business = $b->get_by_id($_GET['id']);

        if( !empty($_POST) ){ // saving edit function goes here
            $b->edit($_GET['id']);

            $business_id = (int)$_GET['id'];
            header("Location: /businesses/edit.php?id=$business_id");
            exit();
        }

    }else{
        header("Location: /");
        exit();
    }



    // unique html head vars
    $title = 'Edit Business';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

?>

    <div class="container">
            <div class="row">
                    <div class="col-md-8">
                        <div class="card border-success mt-3">
                            <div class="card-header">
                                <h4>Edit Business:</h4>
                            </div><!-- .card-header -->
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <?php

                                            if( !empty($business['filename']) ){
                                                echo '<img id="img-preview" class="img-fluid mb-4" src="/assets/files/'.$business['filename'].'">';
                                            }else{
                                                echo '<img id="img-preview" class="img-fluid mb-4" src="/assets/images/default-business-photo.jpg">';
                                            }
                                            ?>
                                            <input id="file-with-preview" type="file" name="fileToUpload" onchange="previewFile()">
                                        </div>
                                    <div class="form-group">
                                        <label>Business Name</label>
                                        <input class="form-control" type="text" name="name" value="<?=$business['name']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address" value="<?=$business['address']?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Province</label>
                                        <?php
                                        echo '<select id="province-select-dropdown" class="form-control" name="province" required>';
                                            foreach($provincesArr as $prCode => $province){
                                                echo '<option value="'.$prCode.'"';

                                                if( $prCode == $business['province'] ){
                                                    echo 'selected';
                                                }

                                                echo '>'.$province.'</option>';
                                            }
                                        echo '</select>';
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <div id="cities-dropdowns">

                                            <?php
                                            echo '<select class="form-control city-dropdowns" name="city" required>';
                                            foreach($citiesArr[$business['province']] as $city){
                                                echo '<option value="'.$city.'"';
                                                if( $city == $business['city'] ){
                                                    echo 'selected';
                                                }
                                                echo '>'.$city.'</option>';

                                            }
                                            echo '</select>';
                                            ?>

                                        </div><!-- #cities-dropdowns -->
                                    </div>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input class="form-control" name="postal_code" type="text" value="<?=$business['postal_code']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="phone_number" type="text" value="<?=$business['phone_number']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="form-control" name="email" type="email" value="<?=$business['email']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input class="form-control" name="website" value="<?=$business['website']?>" type="text">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>

                                </div><!-- .card-body -->
                            </div><!-- .card -->
                    </div><!-- .col-md-8 -->
                </div><!-- .row -->

    </div><!-- .container -->

<?php require_once("../../elements/footer.php");
