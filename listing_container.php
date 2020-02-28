<?php

  $sql_query = searchProerptyQuery($keyword, $property_type, $city, $bedrooms, $bathrooms, $min_sqr_mtr, $max_sqr_mtr , $min_lot_size, $max_lot_size);
  $result = $conn->query($sql_query);
  //$row_pro = $result->fetch_assoc();
  $total_result = $result->num_rows;
?>

<?php if ($total_result > 0) { ?>
	<?php while($row = $result->fetch_assoc()) { ?>
	<?php
	switch ($row['property_contract']) {
		case '1':
			$property_contract = 'Sale';
			break;
		case '2':
			$property_contract = 'Rent';
			break;
		case '3':
			$property_contract = 'Lease';
			break;				
		default:
			$property_contract = 'Sale / Rent';
			break;
	}	
	?>
	<div class="item-grid__container">
  <div class="listing listing--v2">
    <div class="item-grid__image-container item-grid__image-container--v2">
      <a target="_blank" href="property-<?=$row['name_slug']; ?>">
        <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
        <img src="images/properties/<?=$row['image_path']; ?>" alt="<?=$row['name']; ?>" class="listing__img">                    <span class="item__label">For <?=$property_contract; ?></span>
        <span class="listing__favorite listing__favorite--v2"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
      </a>
    </div><!-- .col -->

    <div class="item-grid__content-container item-grid__content-container--v2">
      <div class="listing__content--v2">
        <div class="listing__header">
          <div class="listing__header-primary">
            <span class="listing__type"><?=$row['property_type']; ?></span>
            <h3 class="listing__title"><a target="_blank" href="property-<?=$row['name_slug']; ?>"><?=$row['name']; ?></a></h3>
            <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> <?=$row['address']; ?>           
            </p>
          </div><!-- .listing__header-primary -->
          <p class="listing__price">$<?=number_format($row['price'],0); ?></p>
        </div><!-- .listing__header -->
        <div class="listing__details">
          <ul class="listing__stats">
            <li><span class="listing__figure"><?=$row['bedrooms']; ?></span> Beds</li>
            <li><span class="listing__figure"><?=$row['bathrooms']; ?></span> Baths</li>
            <li><span class="listing__figure"><?=number_format($row['area'],0); ?></span> m<sup>2</sup></li>
          </ul><!-- .listing__stats -->
          <a target="_blank" href="property-<?=$row['name_slug']; ?>" class="listing__btn">Details <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </div><!-- .listing__details -->
      </div><!-- .listing-content -->
    </div><!-- .col -->
  </div><!-- .listing -->
</div><!-- .item-grid__container -->
	<?php } ?>
<?php } else { ?>
	<div class="item-grid__container">
		---- No Record Found ---
	</div><!-- .item-grid__container -->
<?php } ?>