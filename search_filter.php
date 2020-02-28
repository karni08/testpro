<?php
include_once('search_get.php');
// get property type info
$search_pro_type = [];
$search_pro_type_all = 0;
$sql_query = 'Select pt.id, pt.name, count(p.id) as count_property FROM properties as p
		LEFT JOIN property_types as pt ON pt.id = p.property_type_id 
		GROUP BY pt.id';
$result = $conn->query($sql_query);
while($row = $result->fetch_assoc()) {
	$search_pro_type[$row['id']]['name'] =  $row['name'];
	$search_pro_type[$row['id']]['count'] =  $row['count_property'];
	$search_pro_type_all +=  $row['count_property'];
}

// get City
$search_pro_city = [];
$sql_query = 'Select c.id, c.name FROM city as c 
				LEFT JOIN properties as p ON p.city_id = c.id 
				GROUP BY c.id';
$result = $conn->query($sql_query);
while($row = $result->fetch_assoc()) {
	$search_pro_city[$row['id']]=  $row['name'];	
}


?>
<section class="widget main-listing__widget">
            <form class="main-listing__form" action='search.php'>
              <div class="main-listing__wrapper">
                <label class="main-listing__form-title">Property Type</label>
                <div class="main-listing__form-select">
                  <input type="radio" name="type" id="propertyType1" class="main-listing__form-radio" value="">
                  <label for="propertyType1" class="main-listing__form-label">All</label>
                  <span class="main-listing__form-desc">(<?=$search_pro_type_all;?>)</span>
                </div><!-- main-listing__form-select -->

                <?php foreach ($search_pro_type as $key => $pro_type) { ?>
                <div class="main-listing__form-select">
                  <input type="radio" name="type" id="propertyType<?=$key;?>" class="main-listing__form-radio" value="<?=$key;?>">
                  <label for="propertyType2" class="main-listing__form-label"><?=$pro_type['name'];?></label>
                  <span class="main-listing__form-desc">(<?=$pro_type['count'];?>)</span>
                </div><!-- main-listing__form-select -->
            	<?php } ?>
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="listing-city" class="main-listing__form-title">City</label>
                <select name="city" id="listing-city" class="ht-field main-listing__form-field">
                  <option value="" selected>All City</option>
                  <?php foreach ($search_pro_city as $key => $pro_city) { ?>
                  	<option value="<?=$pro_city['name'];?>"><?=$pro_city['name'];?></option>
                  <?php } ?>
                </select><!-- .main-listing__form-field -->
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="main-listing-keyword" class="main-listing__form-title">Keyword</label>
                <input type="text" <?php (!empty($keyword)) ? 'value="$keyword"' : ''; ?> name="q" id="main-listing-keyword" class="main-listing__form-field" placeholder="Enter keywords...">
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="listing-bedroom" class="main-listing__form-title">Bedrooms</label>
                <select name="bedroom" id="listing-bedroom" class="ht-field main-listing__form-field">
                  <option value="" selected>All Beds</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select><!-- .main-listing__form-field -->
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="listing-bathroom" class="main-listing__form-title">Bathrooms</label>
                <select name="bathroom" id="listing-bathroom" class="ht-field main-listing__form-field">
                  <option value="" selected>All Baths</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select><!-- .main-listing__form-field -->
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="min-area" class="main-listing__form-title">Square Meters (m<sup>2</sup>)</label>
                <div class="main-listing__form-container">
                  <select name="min_area" id="min-area" class="ht-field main-listing__form-field">
                    <option value="0" selected>No min</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                  </select><!-- .main-listing__form-field -->

                  <select name="max_area" id="max-area" class="ht-field main-listing__form-field">
                    <option value="0" selected>No max</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                  </select><!-- .main-listing__form-field -->
                </div><!-- .main-listing__form-container -->
              </div><!-- .main-listing__wrapper -->

              <div class="main-listing__wrapper">
                <label for="min-lot" class="main-listing__form-title">Lot Size</label>
                <div class="main-listing__form-container">
                  <select name="min_lot" id="min-lot" class="ht-field main-listing__form-field">
                    <option value="0" selected>No min</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                  </select><!-- .main-listing__form-field -->

                  <select name="max_lot" id="max-lot" class="ht-field main-listing__form-field">
                    <option value="0" selected>No max</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                  </select><!-- .main-listing__form-field -->
                </div><!-- .main-listing__form-container -->
              </div><!-- .main-listing__wrapper -->
            <button type="submit" class="listing__btn">
            	Search <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </button>
			  </form><!-- .main-listing__form -->
          </section><!-- .widget -->

          <section class="widget main-listing__widget widget__news">
            <h3 class="widget__title">Get to Know</h3>
            <ul class="widget__news-list">
              <li class="widget__news-item"><a href="#">Outer Sunset Real Estate: <span>San Francisco Neighborhood Guide</span></a></li>
              <li class="widget__news-item"><a href="#">Pacific Heights Real Estate: <span>San Francisco CA Neighborhood</span></a></li>
              <li class="widget__news-item"><a href="#">Mission District San Francisco: <span>Authentic Community</span></a></li>
              <li class="widget__news-item"><a href="#">Hayes Valley Real Estate: <span>San Francisco CA Neighborhood</span></a></li>
            </ul>
          </section><!-- .widget -->