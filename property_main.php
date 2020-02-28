
<?php  
  $row = $row_pro; 
  $discount = ($row['old_price'] - $row['price']) * 100 / $row['old_price'];
  $discount = number_format(floor($discount), 0);
  $price_per_sqr_meter = $row['price'] / $row['area'];
  $pro_type = ($row['property_contact'] == 1) ? "sale" : "rent";
?>

<ul class="property__main">
  <li class="property__title property__main-item">
    <div class="property__meta">
      <span class="property__offer">For <?=$pro_type; ?></span>
      <span class="property__type">Luxury Apartment</span>
    </div><!-- .property__meta -->
    <h2 class="property__name"><?php echo $row['name']; ?></h2>
    <span class="property__address"><i class="ion-ios-location-outline property__address-icon"></i><?php echo $row['address']; ?></span>
  </li>
  <li class="property__details property__main-item">
    <ul class="property__stats">
      <li class="property__stat"><span class="property__figure"><?php echo $row['bedrooms']; ?></span> Beds</li>
      <li class="property__stat"><span class="property__figure"><?php echo $row['bathrooms']; ?></span> Baths</li>
      <li class="property__stat"><span class="property__figure"><?php echo floor($row['area']); ?></span> m<sup>2</sup></li>
    </ul><!-- .listing__stats -->
  </li>
  <li class="property__price property__main-item">
    <h4 class="property__price-primary">€<?php echo $row['price']; ?></h4>
    <span class="property__price-secondary"><b>Price: €<?=$price_per_sqr_meter; ?>/m<sup>2</sup></b></span><br>
    <span class="property__price-discount">-<?= $discount; ?>%</span>&nbsp;
	<span class="property__price-old">(Old price: €<?php echo $row['old_price']; ?>)</span>
  </li>
</ul>