<?php

get_header(); ?>

<?php if(have_posts()) : ?>
	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php echo the_title(); ?></h1>
		<p><?php echo the_content(); ?></p>
		<p class="uk-postmeta">Skrivet av <strong><?php the_author(); ?></strong> den <?php echo the_date(); ?> <?php echo the_time(); ?></p>
	<?php endwhile; ?>
<?php endif; ?>
	
<?php get_footer(); ?>