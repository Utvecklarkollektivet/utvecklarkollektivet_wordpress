<?php 

// Lägger till Ariktekturen
require_once('inc/architecture.php');

function register_main_nav() {
  register_nav_menu('main-nav', 'Main navigation');
}
add_action( 'init', 'register_main_nav' );

// Lägger till support för thumbnail till bloggpost.
add_theme_support('post-thumbnails', array('post'));

// Template för hur en kommentar ser ut.
function uk_comment_template ($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = '<div ';
			$add_below = 'comment';
		} else {
			$tag = '<li ';
			$add_below = 'div-comment';
		}
?>
		<?php echo $tag; ?><?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="uk-comment">
		<?php endif; ?>
		<div class="uk-comment-author">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
		</div>
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation">Din kommentar avvaktar moderation</em>
		<br />
<?php endif; ?>
		<div class="uk-comment-body">
			<?php comment_text() ?>
		</div>
		<div class="uk-comment-meta">
			<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
				/* translators: 1: date, 2: time */
				$comment_date = get_comment_date();
				$comment_time = get_comment_time();

			?>
			<?php echo $comment_date," ".$comment_time."</a>"; ?>
			<?php edit_comment_link('(Redigera)'); ?>
		</div>
		<div class="uk-comment-reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
}