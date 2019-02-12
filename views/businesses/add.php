<?php require_once '../../core/includes.php';

if( !empty($_POST['name']) && !empty($_POST['address'])  && !empty($_POST['city'])  && !empty($_POST['province']) && !empty($_POST['postal_code']) && !empty($_POST['phone_number']) && !empty($_POST['email']) ){ // Form was submitted

    // Add new business to db
    $b = new Business;
    $b->add();

}

header("Location: /businesses/my-businesses.php");
