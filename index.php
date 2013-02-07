<?php get_header(); ?>

<div role="main" class="page-content">
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

</div><?php //End .page-content ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
	
</body>

</html>
