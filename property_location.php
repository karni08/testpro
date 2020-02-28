<?php
  $property_slug = $_GET['slug'];
  $sql_query = "SELECT c.id, c.name, c.country FROM city as c
  INNER JOIN properties as p ON p.city_id = c.id
  where p.name_slug = '$property_slug'";  
  $result = $conn->query($sql_query);
  $row_pro_city = $result->fetch_assoc();
?>

<div class="property__feature">
    <h3 class="property__feature-title property__feature-title--b-spacing">Property Location: <?php echo ucfirst($row_pro_city['name']); ?></h3>
	<div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 100%">
  		<iframe src="https://maps.google.com/maps?q=<?=ucfirst($row_pro_city['name']); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
    style="border:0" allowfullscreen></iframe>
	</div>
</div>