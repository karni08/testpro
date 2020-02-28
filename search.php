<?php include('header.php'); ?>
<?php include('config/function.php'); ?>
<?php    
  $page_name = 'Property List';
?>
<?php include('search_get.php'); ?>
<section class="main-listing">  
  <?php include('breadcrumbs.php'); ?>
  <div class="main-listing__main">
    <div class="container">
      <div class="row">
        <h1 class="section__title section__title--centered section__title--b-margin-40">36 Homes for Sale in Portugal</h1>
        <aside class="col-md-3">
          <?php include('search_filter.php'); ?>
        </aside><!-- .col -->

        <main class="col-md-9">
          <?php include('listing.php'); ?>
        </main><!-- .col -->
      </div><!-- row -->
    </div><!-- .container -->
  </div><!-- .main-listing__main -->
</section><!-- .main-listing -->