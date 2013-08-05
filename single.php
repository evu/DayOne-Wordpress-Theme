<?php get_header(); ?>

<section class="page-wrap">
	<div class="grid">
		<main role="main" class="page-content desk-2-3">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
					<h1><?php the_title(); ?></h1>
						
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						
					<?php the_tags( 'Tags: ', ', ', ''); ?>
					
				</article>
				
				<?php comments_template(); ?>

			<?php endwhile; endif; ?>

		</main><?php //End .page-content ?>

		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>
	
</body>

</html>