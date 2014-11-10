<?php 

/*
Template Name: Template Page
*/

get_header(); ?>

	<section role="main" class="page-content">

		

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


				
			<article class="post" id="post-<?php the_ID(); ?>">


				<h1><?php the_title(); ?></h1>


				<?php excerpt_or_more(); ?>


			</article>



		<?php endwhile; endif; ?>



	</section><?php //End .page-content ?>


	<?php get_sidebar(); ?>
	

<?php get_footer(); ?>