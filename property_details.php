<?php
  $property_slug = $_GET['slug'];
  $sql_query = "SELECT * FROM property_details as pd
  INNER JOIN properties as p ON p.id = pd.property_id
  where p.name_slug = '$property_slug'";  
  $result = $conn->query($sql_query);
  $row_pro_detail = $result->fetch_assoc();
?>

<div class="property__feature">
      <h3 class="property__feature-title property__feature-title--b-spacing">Property Details</h3>
      <ul class="property__details-list">
        <li class="property__details-item"><span class="property__details-item--cat">Type:</span> <?=$row_pro_detail['type']; ?></li>
        <li class="property__details-item"><span class="property__details-item--cat">Year Built:</span> <?=$row_pro_detail['year_build']; ?></li>
        <li class="property__details-item"><span class="property__details-item--cat">Property Size:</span> <?=$row_pro_detail['property_size']; ?></li>
        <li class="property__details-item"><span class="property__details-item--cat">Land Size:</span> <?=$row_pro_detail['land_size']; ?></li>
        <li class="property__details-item"><span class="property__details-item--cat">Property Type:</span> <?=$row_pro_detail['property_type']; ?></li>
<li class="property__details-item"><span class="property__details-item--cat">Energy Ratig:</span> <?=$row_pro_detail['energy_rating']; ?></li>
      </ul><!-- .property__details-list -->
    </div>