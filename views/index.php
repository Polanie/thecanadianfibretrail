<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

?>

        <div id="shop-selections">
            <div class="container">
                <div id="search-choices">
                    <form class="first-column" action="index.html" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label id="shop-lists">
                                    <input type="checkbox" name="options" value="yarn shops" checked>Find Yarn Shops<br>
                                   <input type="checkbox" name="options" value="indie dyers" checked>Find Indie Dyers<br>
                                   <input type="checkbox" name="options" value="spinning shops" checked>Find Spinning Shops<br>
                                        <span class="checkmark"></span>
                                </label>
                            </div><!-- col-md-3-->
                            <div class="col-md-4">
                                <label id="shop-lists">
                                    <input type="checkbox" name="options" value="quilting shops" checked>Find Quilting Shops<br>
                                   <input type="checkbox" name="options" value="cross stitch shops" checked>Find Cross Stitch Shops<br>
                                   <input type="checkbox" name="options" value="embroidery shops" checked>Find Embroidery Shops<br>
                                        <span class="checkmark"></span>
                                </label>
                            </div><!-- col-md-4-->
                            <div class="col-md-4">
                                <label id="shop-lists">
                                    <input type="checkbox" name="options" value="quilting shops" checked>Find Needlepoint Shops<br>
                                   <input type="checkbox" name="options" value="cross stitch shops" checked>Guilds<br>
                                        <span class="checkmark"></span>
                                </label>
                            </div><!-- .col-md-4-->
                        </div><!-- .row-->

                            <h5>Search Options</h5>
                                <form id="search-form" class="form-inline my-2 my-lg-0">
                                  <input id="search-input" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                                 <h4>Please start to type in the business you are looking for...</h4>
                                </form>
                                </div> <!-- search-choices-->
                    </form>
            </div><!-- !container-->
        </div><!-- #shop-selections -->

        <div class="container">

            <h1> Business Listings</h1>
                <div id="business-display" class="row">

                <?php
                $b = new Business;
                $businesses = $b->get_all();

                foreach($businesses as $business){ ?>

                    <div class="business-post col-md-6" data-businessID="<?=$business['id']?>">
                        <?php
                        if( !empty($business['filename']) ){
                            echo '<img class="img-fluid" src="/assets/files/'.$business['filename'].'">';
                        }else{
                            echo '<img class="img-fluid" src="/assets/images/default-business-photo.jpg">';
                        }

                        ?>
                            <div class="business-listing">
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
                            </div>
                        <div class="review-loop">

                            <?php

                            $r = new Review;
                            $reviews = $r->get_all_by_business_id($business['id']);


                            foreach($reviews as $review){

                            ?>
                            <div class="business-review">

                                <p>
                                    <span class="font-weight-bold review-persons-name"><?=$review['persons_name']?></span> <?=$review['review']?>
                                </p>
                            </div><!-- .business-review. -->
                            <?php } ?>
                            </div><!-- .review-loop -->
                            <form class="review-form" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="business_id" value="<?=$business['id']?>" required>
                                    <label>Leave a Review</label>
                                    <input id="text-spacing" class="form-control reviewForm-persons-name-field" type="text" name="persons_name" placeholder="your name" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control reviewForm-review-field" name="review" placeholder="Write a review ...." required></textarea>
                                </div>
                                <input class="btn btn-primary mb-3" type="submit" value="Submit">
                            </form>
                    </div><!-- .col-md-6 -->
            <?php } ?>
        </div><!-- .row -->
    </div><!-- #business-display -->


<?php require_once("../elements/footer.php");
