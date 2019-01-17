
<?php /* Template Name: Filmes */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
	<main role="main">
		<!-- section -->
		<section>

            <h1>
                <?php the_title(); ?>
            </h1>
            
                    
                
            <?php 
            $newsArgs = array( 'post_type' => 'filme', 'posts_per_page' => 4);                   
            $field_name="Filme";                       
                $newsLoop = new WP_Query( $newsArgs );                  
                                    
                while ( $newsLoop->have_posts() ) : $newsLoop->the_post();              ?>
            <div class="col-xl-4">
                <div class="card">
                    <?php $attr = array(
                                'src'   => $src,
                                'alt' => "Card image cap",
                                'class' => " card-img card-img-top ",
                            ); ?>
                <?php the_post_thumbnail('',$attr); // Fullsize image for the single post ?>
                        <div class="card-body">
                            <p class="card-text">
                            <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                
                            </a>
                        <?php endif; ?>                                
                        <h3>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <!-- detalhes do filme -->
                        <p>
                            Diretor: <?php echo get_field('diretor') ?> | 
                            Duração: <?php echo get_field('duracao') ?> | 
                            <?php echo get_the_term_list( $post->ID, 'categoria-filmes', 'Categorias: ', ', ') ?> | 
                            Classificação: 
                            <?php
                                $tags= get_the_terms( $id, 'idade');
                                foreach($tags as $tag): 
                            ?>
                                <a class="link-classificacao" href="<?php echo get_tag_link( $tag->term_id ) ?>" target="_self">
                                    <?php echo $tag->name ?>
                                </a>
                            <?php endforeach;?>	
                        <!-- <p>	 -->
                            <?php //echo wp_trim_words( get_the_content(), 20, '...' );?>
                        <!-- </p> -->
                    </div>
                </div>
            </div>
            
            <div class="filme">
                    
                    	
            </div>
            <?php endwhile; ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">
                
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
        </div>
    </div>
<?php get_footer(); ?>
