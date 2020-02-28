<?php 
	$sql_query = "SELECT * FROM properties where id = 1";  
  $result = $conn->query($sql_query);
  $properties = $result->fetch_assoc();
  
?>
<div class="property__feature">
  <h3 class="property__feature-title property__feature-title--b-spacing">Property Description</h3>
  <?php echo $properties['description']; ?>
</div>