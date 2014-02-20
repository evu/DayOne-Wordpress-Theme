<?php get_header(); ?>

	<div class="grid">
		<section role="main" class="page-content desk-2-3">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				<article class="post" id="post-<?php the_ID(); ?>">

					<h1><?php the_title(); ?></h1>

					<?php excerpt_or_more(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				</article>

			<?php endwhile; endif; ?>

		</section><?php //End .page-content ?>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>
