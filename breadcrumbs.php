<?php
	$breadcrumbs[0] = array('herf' => 'index.html', 'name' => 'Home');
	$breadcrumbs[1] = array('herf' => '#', 'name' => 'Portugal');
	if (!empty($property_slug)) {
		$breadcrumbs[] = array('herf' => '#', 'name' => 'Algarve');
		$breadcrumbs[] = array('herf' => '', 'name' => $row_pro['name']); 
	} else {
		$breadcrumbs[] = array('herf' => '', 'name' => $page_name); 
	}
?>

<div class="container">
  <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
  	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
  		<li class="ht-breadcrumbs__item">
  			<?php if (!empty($breadcrumb['herf'])) { ?>
  			<a href="index.html" class="ht-breadcrumbs__link">
	  			<span class="ht-breadcrumbs__title"><?=$breadcrumb['name'] ; ?></span>
  			</a>
  		<?php } else {  ?>
  			<span class="ht-breadcrumbs__page"><?=$breadcrumb['name'] ; ?></span>
  		<?php } ?>
  		</li>
  	<?php } ?>    
  </ul><!-- ht-breadcrumb -->
</div><!-- .container -->