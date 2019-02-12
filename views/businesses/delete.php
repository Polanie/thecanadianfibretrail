<?php require_once '../../core/includes.php';

$b = new business;
$b->delete();

header("Location: /businesses/my-businesses.php");
exit();
