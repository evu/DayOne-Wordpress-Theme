<?php get_header(); ?>

	<?php
		if (is_home()) { $the_header = "News"; }
		else if ( is_day() ) { $the_header = "Daily archives for " . get_the_date(); }
		else if ( is_month() ){ $the_header = "Monthly archives for " . get_the_date('F, Y'); }
		else if ( is_year() ){ $the_header = "Yearly archives for " . get_the_date('Y'); }
		else if ( is_category() ){ $the_header = "Category for " . single_cat_title( '', false ); }
		else { $the_header = "Archives"; }
	?>



	<section role="main" class="page-content alignleft">


		<h1><?php echo $the_header; ?></h1>



		<?php 

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		  'posts_per_page' => 3,
		  'paged' => $paged
		);

		query_posts($args); 

		if (have_posts()) : while (have_posts()) : the_post(); ?>



			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<?php excerpt_or_more(); ?>

				<footer class="post-meta">
					Tags: <?php the_tags( 'Tags: ', ', ', ''); ?>
					Posted in: <?php the_category(', ') ?>
					Comments: <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</footer>

			</article>


			
			<?php if ($paged): ?>
				<div class="pagination aligncenter cf clear">
					<?php if (get_previous_posts_link()): ?>
						<span class="alignleft"></span><?php previous_posts_link( 'Recent posts' ); ?></span>
					<?php endif; ?>
					<?php if (get_next_posts_link()): ?>
						<span class="alignright"><?php next_posts_link( 'Previous posts' ); ?></span>
					<?php endif ?>
				</div>
			<?php endif; ?>


			
			<?php comments_template(); ?>



		<?php endwhile; endif; ?>



	</section><?php //End .page-content ?>



	<?php get_sidebar(); ?>
	
		
<?php get_footer(); ?>
