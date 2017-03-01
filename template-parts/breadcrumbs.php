<?php
/**
 * Template part for displaying the breadcrumbs.
 *
 * @package wordpress-boilerplate
 */

?>

<div class="breadcrumbs">
  <div class="wrapper">
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    }
    ?>
  </div>
</div>
