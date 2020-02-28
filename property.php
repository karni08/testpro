<?php include('header.php'); ?>
<?php include('config/function.php'); ?>
<?php
  $property_slug = getSafe($_GET['slug']);
  $sql_query = "SELECT * FROM properties where name_slug = '$property_slug'";  
  $result = $conn->query($sql_query);
  $row_pro = $result->fetch_assoc();
?>


<section class="property">
  <?php include('breadcrumbs.php'); ?>
  <div class="property__header">
    <div class="container">
      <div class="property__header-container">
        <?php //echo $property_slug; ?>
        <?php include('property_main.php'); ?>
        <!-- .property__main -->
        <?php include('property_list.php'); ?>
        <!-- .property__list -->
      </div><!-- .property__header-container -->
    </div><!-- .container -->
  </div><!-- .property__header -->

  <div class="property__container">
    <div class="container">
      <div class="row">
        <main class="col-md-9">
          <div class="property__feature-container">
            <?php include('property_slider.php'); ?>
            <!-- .property__slider -->
            <?php include('property_description.php'); ?>
            <!-- .property__feature -->
            <?php include('property_details.php'); ?>
            <!-- .property__feature -->
            <?php include('property_features.php'); ?>
            <!-- .property__feature -->
            <?php include('property_location.php'); ?>
            <!-- .property__feature -->
            <?php include('schedule_a_visit.php'); ?>
            <!-- .property__feature -->
          </div><!-- .property__feature-container -->
        </main>

        <aside class="col-md-3">
          <div class="widget__container">         
            <?php include('contact_us_now.php'); ?>
            
            <?php include('similar_homes.php'); ?>
            <!-- .widget -->
            <?php include('get_to_know.php'); ?>
          </div><!-- .widget__container -->
        </aside>
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .property__container -->
</section><!-- .property -->
<?php include('footer.php'); ?>
