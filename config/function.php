<?php
include('database.php');
$db = Database::getInstance();
$conn = $db->getConnection();

function getSafe($var='',$conn) {
	$var = strip_tags($conn->real_escape_string(trim($var)));
	return $var;
}

function searchProerptyQuery($keyword = '', $property_type = '', $city = '', $bedrooms = '', $bathrooms = '', $min_sqr_mtr = '', $max_sqr_mtr = '', $min_lot_size = '', $max_lot_size = '', $sort_key = 'default', $sort_order = 'asc', $page = 1 , $limit = 20) {

	$query = '';
	$query .= 'Select p.id, p.name, p.address, p.name_slug, p.price, p.bedrooms, p.bathrooms, p.area, p.property_contract,  pi.image_path, pt.name as property_type FROM properties as p
				INNER JOIN property_details as pd ON pd.property_id = p.id
				INNER JOIN property_types as pt ON pt.id = p.property_type_id
				INNER JOIN property_images as pi ON pi.property_id = p.id ';
	$query .= ' WHERE pi.main_image = 1 ';

	// query where condition
	if (!empty($keyword)) {
		$query .= ' AND p.name LIKE "%'.$keyword.'%"';
	}

	if (!empty($property_type)) {
		$query .= ' AND p.property_type_id = '. $property_type;
	}

	if (!empty($city)) {
		$query .= ' AND p.city_id = '. $city;
	}

	if (!empty($bedrooms)) {
		$query .= ' AND p.bedrooms = '. $bedrooms;
	}

	if (!empty($bathrooms)) {
		$query .= ' AND p.bathrooms = '. $bathrooms;
	}

	if (!empty($min_sqr_mtr)) {
		$query .= ' AND p.area > '. $min_sqr_mtr;
	}

	if (!empty($min_sqr_mtr)) {
		$query .= ' AND p.area >= '. $min_sqr_mtr;
	}

	if (!empty($max_sqr_mtr)) {
		$query .= ' AND p.area <= '. $max_sqr_mtr;
	}

	if (!empty($min_lot_size)) {
		$query .= ' AND p.lot_size >= '. $min_lot_size;
	}

	if (!empty($max_lot_size)) {
		$query .= ' AND p.lot_size <= '. $max_lot_size;
	}

	// sorting
	if(!empty($sort_key)) {
		if ($sort_key == 'price') {
			$query .= ' ORDER BY p.price '. $sort_order;
		} elseif($sort_key == 'featured') {
			$query .= ' ORDER BY p.is_featured '. $sort_order;
		} else {
			$query .= ' ORDER BY p.name '. $sort_order;
		}		
	}
	
	// paging
	$ofset = ($page -1) * $limit;
	$query .= ' LIMIT '. $ofset . ', ' . $limit;

	return $query;

}
