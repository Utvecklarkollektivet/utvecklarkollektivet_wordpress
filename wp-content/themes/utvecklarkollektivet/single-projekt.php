<?php 

get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row-fluid">
			<div class="span8 uk-projekt">
				<h1><?php echo the_title(); ?></h1>
				<p><?php echo the_excerpt(); ?></p>
				<?php $membersInProjekt = simple_fields_fieldgroup("medlemmar"); ?>
				<h3>Medlemmar i projektet</h3>
				<ul class="uk-projekt-medlemmar">
					<?php foreach($membersInProjekt as $member) : ?>
						<li class="uk-projekt-medlemmar-medlem"><?php echo $member['medlem_fornamn']." ".$member['medlem_efternamn']." - ".$member['medlem_roll']; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="span4">
				<?php comments_template(); ?>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>