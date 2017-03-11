<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpress_boilerplate
 */

?>

  	</div><!-- #content -->
  </div><!-- .wrapper -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- jQuery fallback -->
<script>
if (typeof jQuery == 'undefined') {
  document.write(unescape("%3Cscript src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery-1.11.1.min.js' type='text/javascript'%3E%3C/script%3E"));
}
</script>

<?php wp_footer(); ?>

</body>
</html>
