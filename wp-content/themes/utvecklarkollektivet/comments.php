<?php
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<ul class="comment-list">
			<?php 
				wp_list_comments('type=comment&callback=uk_comment_template'); 
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h3 class="assistive-text section-heading">Navigering för kommentarer</h3>
			<div class="nav-previous">Äldre kommentarer</div>
			<div class="nav-next">Nyare kommentarer</div>
		</nav>
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments">Ingen kommentering tillåten.</p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	<?php
		$comments_args = array(
	        // change the title of send button 
	        'label_submit'=>'Skicka kommentar',
	        // change the title of the reply section
	        'title_reply'=>'Diskussion',
	        // remove "Text or HTML to be displayed after the set of comment fields"
	        'comment_notes_after' => '',
	        // redefine your own textarea (the comment body)
	        'comment_field' => '<label for="comment">Kommentar</label><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
		);
		comment_form($comments_args); 
	?>

</div><!-- #comments -->