<?php get_header(); ?>

<section class="page-wrap">
	<div class="grid">
		<main role="main" class="page-content">
			<?php if (have_posts()) : ?>

				<h2>Search Results</h2>

				<?php while (have_posts()) : the_post(); ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

						<?php the_excerpt(); ?>

					</article>

				<?php endwhile; ?>

			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>

		</main><?php //End .page-content ?>

		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>
	
</body>

</html>
