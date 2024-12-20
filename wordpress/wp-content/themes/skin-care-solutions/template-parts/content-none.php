<?php
/**
 * The default template for no content
 * @subpackage Skin Care Solutions
 * @since 1.0.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'skin-care-solutions' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		// If this is the home page and the user can publish posts.
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php 
				printf( 
					wp_kses( 
						/* translators: %1$s: Link to create a new post. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'skin-care-solutions' ), 
						array( 'a' => array( 'href' => array() ) ) 
					), 
					esc_url( admin_url( 'post-new.php' ) ) 
				); 
			?></p>

		<?php 
		// If the user is on a search results page and no results were found.
		elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'skin-care-solutions' ); ?></p>
			<?php get_search_form(); ?>

		<?php 
		// If no content is available.
		else : ?>

			<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'skin-care-solutions' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>