<!-- 404 Error Page -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row error no-row-spacing">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <h1>404</h1>
          <h3 class="error-message">Whoa there!</h3>
          <h3 class="error-message">Page not found</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container">
    <div class="row">
      <div class="col m10 offset-m1 links content">
      <p class="flow-text error-message">Looks like the page you are looking for doesn't exist.
        You can select a menu item above to navigate to another page on this site or go back to your previous page.</p>
      <a href="javascript:window.history.back()" class="waves-effect waves-teal btn-flat">go back</a>
      </div>
    </div>
    <!-- <div class="bumper"></div> -->
  </div>

<!-- Footer -->
<?php get_footer(); ?>