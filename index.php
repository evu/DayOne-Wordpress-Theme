<?php get_header(); ?>

<section class="page-wrap">
	<div class="grid">
		<main role="main" class="page-content desk-2-3">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<?php the_content(); ?>

					<footer class="post-meta">
						<?php the_tags( 'Tags: ', ', ', ''); ?>
						Posted in <?php the_category(', ') ?> | 
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</footer>

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
