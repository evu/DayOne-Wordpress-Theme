<?php get_header(); ?>

<div role="main" class="page-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

		</article>

	<?php endwhile; endif; ?>

</div><?php //End .page-content ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
	
</body>

</html>
