
<?php /* Template Name: Filmes */ ?>
<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

            <h1><?php the_title(); ?> - pg filmes</h1>
            <?php 
            $newsArgs = array( 'post_type' => 'filme', 'posts_per_page' => 4);                   
            $field_name="Filme";                       
                $newsLoop = new WP_Query( $newsArgs );                  
                                    
                while ( $newsLoop->have_posts() ) : $newsLoop->the_post();              ?>
            <div class="filmes">
                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                        </a>
                    <?php endif; ?>                                
                    <h1>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    <p>
                        <?php the_content(); ?>
                        Diretor: <?php get_field('diretor','Filme'); ?>
                        <?php the_field($field_name,'diretor'); ?>
                    </p>
                    <p>
                        <?php echo get_the_term_list( $post->ID, 'categoria-filmes', 'Categorias: ', ' '); ?>
                    </p>
                    <p>Retornando o campo personalizado:
                        <?php echo get_post_meta($post->ID, 'valor_meta', true); ?>
                    </p>
            </div>
            <?php endwhile; ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>
                
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
