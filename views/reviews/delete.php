<?php  require_once '../../core/includes.php';

$review_data = array(
    'error' => true
);

if( !empty($_POST['review_id']) ){

    $r = new Review;
    $review_data = $r->delete($review_data);
    $review_data['error'] = false;

}
