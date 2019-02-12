<?php  require_once '../../core/includes.php';
header("Content-Type: application/json");
$categories_data = array(
    'error' => true
);

if( !empty($_POST['business_id']) ){ //Comment form Submitted, project id present

    //Add new categories to db
    $c = new Categories;
    $categories_data = $c->add($categories_data);

}

echo json_encode($categories_data);
die();
