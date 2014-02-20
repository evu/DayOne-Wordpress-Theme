<?php get_header(); ?>

	<div class="grid">
		<section role="main" class="page-content desk-2-3">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
					<h1><?php the_title(); ?></h1>
						
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						
					<footer class="post-meta">
						Tags: <?php the_tags( 'Tags: ', ', ', ''); ?>
						Posted in: <?php the_category(', ') ?>
						On: <?php the_date(); ?>
					</footer>
					
				</article>
				
				<?php comments_template(); ?>

			<?php endwhile; endif; ?>

		</section><?php //End .page-content ?>

		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>