<?php  require_once '../../core/includes.php';

$review_data = array(
    'error' => true
);

if( !empty($_POST['business_id']) && !empty($_POST['review']) && !empty($_POST['persons_name']) ){ //Review form Submitted, project id present

    //Add new review to db
    $r = new Review;
    $review_data = $r->add($review_data);

}

echo json_encode($review_data);
die();
