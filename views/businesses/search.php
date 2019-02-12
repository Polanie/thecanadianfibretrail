<?php  require_once("../../core/includes.php");

$b = new Business;
$businesses = array();


$businesses = $b->search();

echo json_encode($businesses);
die();
