<?php 
  $sql_query = "SELECT * FROM property_images where property_id = 1";  
  $result = $conn->query($sql_query);
  $main_image = '';
  $image_array = array();
  while($row = $result->fetch_assoc()) {
    if($row['main_image'] == 1) {
      $main_image = $row['image_path'];
    } else {
      $image_array[] = $row['image_path'];
    }    
  }  
?>

<div class="property__slider property__slider--v2">
                <div class="property__slider-container">
                  
                  <div class="property__slider-main">
                    <div class="property__slider-images">
                      <div class="property__slider-image">
                        <img src="images/properties/<?=$main_image; ?>" alt="<?=$main_image; ?>" width="100%">
                      </div><!-- .property__slider-image -->
                      <?php foreach($image_array as $image) { ?>
                      <div class="property__slider-image">
                        <img src="images/properties/<?=$image; ?>" alt="<?=$image; ?>" width="100%">
                      </div><!-- .property__slider-image -->
                      <?php } ?>
                    </div><!-- .property__slider-images -->
          
                    <ul class="image-navigation">
                      <li class="image-navigation__prev">
                        <span class="ion-ios-arrow-left"></span>
                      </li>
                      <li class="image-navigation__next">
                        <span class="ion-ios-arrow-right"></span>
                      </li>
                    </ul>
          
                    <span class="property__slider-info"><i class="ion-android-camera"></i><span class="sliderInfo"></span></span>
                  </div><!-- .property__slider-main -->

                  <ul class="property__slider-nav property__slider-nav--horizontal">
                    
                    <li class="property__slider-item">
                      <img src="images/properties/<?=$main_image; ?>" alt="<?=$main_image; ?>">
                    </li><!-- .property__slider-item -->
                    <?php foreach($image_array as $image) { ?>
                    <li class="property__slider-item">
                      <img src="images/properties/<?=$image; ?>" alt="<?=$image; ?>">
                    </li><!-- .property__slider-item -->
                    <?php } ?>                    
                  </ul><!-- .property__slider-nav -->
                </div><!-- .property__slider-container -->
            </div>