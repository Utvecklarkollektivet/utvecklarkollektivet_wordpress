<?php 

get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row-fluid">
			<div class="span8 uk-projekt">
				<h1><?php echo the_title(); ?></h1>
				<p><?php echo the_excerpt(); ?></p>

				<?php $roles_needed = simple_fields_fieldgroup("roles_needed"); ?>
				<h3>Roller som behövs till projektet</h3>
				<ul class="uk-project-roles-needed">
					<?php foreach ($roles_needed as $role) : ?>
						<li class="uk-project-roles-needed-role"><?php echo $role; ?></li>
					<?php endforeach; ?>
				</ul>
				<?php $membersInProjekt = simple_fields_fieldgroup("medlemmar"); ?>
				<h3>Medlemmar i projektet</h3>
				<ul class="uk-projekt-medlemmar">
					<?php foreach($membersInProjekt as $member) : ?>
						<li class="uk-projekt-medlemmar-medlem"><?php echo $member['medlem_fornamn']." ".$member['medlem_efternamn']." - ".$member['medlem_roll']; ?></li>
					<?php endforeach; ?>
				</ul>
				<?php $github_link = simple_fields_fieldgroup("github_link"); ?>
				<h4>Repo</h4>				
				<a class="uk-project-github" href="<?php echo $github_link; ?>"><span class="icon-github-sign icon-4x"></span></a>
			</div>
			<div class="span4">
				<?php comments_template(); ?>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>