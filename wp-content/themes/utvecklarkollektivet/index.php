<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<?php get_header(); ?>
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="span8 uk-blogpost">
					<a href="<?php the_permalink(); ?>"><h2><?php echo the_title(); ?></h2></a>
					<p><?php echo the_excerpt(); ?></p>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
<?php get_footer(); ?>