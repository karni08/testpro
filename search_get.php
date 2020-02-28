<?php
include_once('function.php');
$keyword = $property_type = $city = $bedrooms = $bathrooms = $min_sqr_mtr = $max_sqr_mtr = $min_lot_size = $max_lot_size = '';

if(isset($_GET['q'])) {
	$keyword = getSafe($_GET['q'],$conn);
}

if(isset($_GET['type'])) {
	$property_type = getSafe($_GET['type'],$conn);
}

if(isset($_GET['city'])) {
	$city = getSafe($_GET['city'],$conn);
}

if(isset($_GET['bedroom'])) {
	$bedrooms = getSafe($_GET['bedroom'],$conn);
}

if(isset($_GET['bathroom'])) {
	$bathrooms = getSafe($_GET['bathroom'],$conn);
}

if(isset($_GET['min_area'])) {
	$min_sqr_mtr = getSafe($_GET['min_area'],$conn);
}

if(isset($_GET['max_area'])) {
	$max_sqr_mtr = getSafe($_GET['max_area'],$conn);
}

if(isset($_GET['min_lot'])) {
	$min_lot_size = getSafe($_GET['min_lot'],$conn);
}

if(isset($_GET['max_lot'])) {
	$max_lot_size = getSafe($_GET['max_lot'],$conn);
}



