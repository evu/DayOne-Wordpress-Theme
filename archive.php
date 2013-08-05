<?php get_header(); ?>

<section class="page-wrap">
	<div class="grid">
		<main role="main" class="page-content">

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>
				
					<article <?php post_class() ?>>
					
						<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

						<?php the_content(); ?>

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
