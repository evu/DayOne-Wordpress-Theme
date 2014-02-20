<?php get_header(); ?>

	<div class="grid">
		<section role="main" class="page-content">

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>
				
					<article <?php post_class() ?>>
					
						<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

						<?php excerpt_or_more(); ?>

					</article>

				<?php endwhile; ?>

			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>

		</section><?php //End .page-content ?>

		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
