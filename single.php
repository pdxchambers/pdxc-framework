<?php
/**
 * The default template
 *
 * @package WordPress
 * @subpackage pdxc-framework
 * @since PDXC Framework 1.0
 */
 get_header();
?>
			<div id="site-content">
            		<?php
                    	if(have_posts()){
                    		while(have_posts()) {
                    			the_post();
                    ?>
            		<article class="post-wrapper single-post-wrapper">
            			<header class="post-header single-post-header">
            				<?php
                 			if ( has_post_thumbnail() ) {
            	            	the_post_thumbnail( '', array('class' => 'post-thumb aligncenter'));
            	            } else {
            	            	/*placeholder for something to do if no post_thumbnail*/
            	            }//end if/else
            	         ?>
                     		<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                     		<div class="post-meta">
                	     		<p class="author">By <?php the_author() ?></p>
                	     		<p class="post-date"><?php the_time( 'l, F jS, Y' ); ?></p>
                     		</div>
            			</header>
            			<section class="post-content">
                 			<?php the_content(); ?>
                 		</section>
                 		<footer class="post-footer single-post-footer">
                	     	<p class="post-categories">Category: <?php the_category( ', ' ); ?>.</p>
                	     	<p class="post-tags"><?php the_tags( 'Tagged in: '); ?></p>
                 		</footer>
            		</article>
            		 <?php
                     		} //endwhile
                    	} //endif
					?>
					<div id="post-nav">
						<div id="prev-post">
							<?php			
								previous_post_link( '&laquo; %link', 'Previous Post' );
							?>
						</div>
						<div id="next-post">
							<?php
								next_post_link( '%link &raquo;', 'Next Post');
							?>
						</div>
					</div>
                 <?php
                	get_sidebar();
                 ?>
            </div><!-- Site Content -->
<?php get_footer(); ?>
