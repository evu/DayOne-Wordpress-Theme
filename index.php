<?php get_header(); ?>

	<section role="main" class="page-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<?php excerpt_or_more(); ?>

				<footer class="post-meta">
					Tags: <?php the_tags( 'Tags: ', ', ', ''); ?>
					Posted in: <?php the_category(', ') ?>
					Comments: <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</footer>

			</article>
			
			<?php comments_template(); ?>

		<?php endwhile; endif; ?>

	</section><?php //End .page-content ?>

	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
