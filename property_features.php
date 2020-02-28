<?php
$sql_query = "SELECT f.name FROM features as f
inner join property_features  as pf ON pf.feature_id = f.id
inner join properties  as p ON p.id = pf.property_id
where p.name_slug = '$property_slug'";  
$result = $conn->query($sql_query);
?>

<div class="property__feature">
  	<h3 class="property__feature-title property__feature-title--b-spacing">Property Features</h3>
  	<ul class="property__features-list">
  		<?php
  		while($row = $result->fetch_assoc()) {
  			$icon_name = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($row['name']));

  		?>
  			<li class="property__features-item"><img src="images/icon-<?=$icon_name ?>.png" alt=""/>&nbsp;<?=$row['name']; ?></li>
  		<?php 
  		}
  		?>
	    </ul><!-- .property__features-list -->
</div>