<?php 

get_header(); ?>
	<?php if ( is_user_logged_in() ) : ?> 
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row-fluid">
					<div class="span8 uk-projekt">
						<a href="<?php the_permalink(); ?>"><h2><?php echo the_title(); ?></h2></a>
						<p><?php echo the_excerpt(); ?></p>

						<?php $roles_needed = simple_fields_fieldgroup("roles_needed"); ?>

						<?php // Om det inte finns några roller som behövs. ?>
						<?php if(sizeof($roles_needed) > 0) : ?>
							<h4>Roller som behövs</h4>
							<ul class="uk-project-roles-needed">
								<?php foreach($roles_needed as $role) : ?>
									<li class="uk-project-roles-needed-role"><?php echo $role; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						
						<?php $membersInProjekt = simple_fields_fieldgroup("medlemmar"); ?>
						<h4>Medlemmar i projektet</h4>
						<ul class="uk-projekt-medlemmar">
							<?php foreach($membersInProjekt as $member) : ?>
								<li class="uk-projekt-medlemmar-medlem"><?php echo $member['medlem_fornamn']." ".$member['medlem_efternamn']." - ".$member['medlem_roll']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php else : ?>
		<div class="row-fluid">
			<h2 class="span12">För att se alla projekt måste du vara inloggad.</h2>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>