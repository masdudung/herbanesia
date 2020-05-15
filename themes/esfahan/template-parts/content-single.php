<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Esfahan
 */

$layout 		= esfahan_single_layout();
$hide_thumb 	= get_theme_mod( 'single_hide_thumb' );
$hide_date 		= get_theme_mod( 'single_hide_date' );
$hide_cats 		= get_theme_mod( 'single_hide_cats' );
$hide_author 	= get_theme_mod( 'single_hide_author' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ( $layout['type'] == 'layout-default' ) && ( $hide_thumb == '' ) ) : ?>
		<?php esfahan_post_thumbnail(); ?>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			if ( $hide_date == '' ) {
				esfahan_posted_on();
			}
			the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				if ( $hide_cats == '' ) {
					esfahan_all_categories();
				}
				if ( $hide_author == '' ) {
					esfahan_posted_by();
				}
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->	

	<?php if ( ( $layout['type'] == 'layout-full' ) && ( $hide_thumb == '' ) ) : ?>
		<?php esfahan_post_thumbnail(); ?>
	<?php endif; ?>	

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'esfahan' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'esfahan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php esfahan_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
