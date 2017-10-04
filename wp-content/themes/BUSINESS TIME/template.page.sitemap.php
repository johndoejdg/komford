<?php 
/*
 * Template Name: Page sitemap
 */
get_header(); ?>

<div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65" >

			
<div class="rese">

                    <h3 style="margin-bottom:-5px"><?php _e('Pages'); ?></h3>
        
                    <ul style="padding-left:20px important; margin-bottom:25px !important;">
                        <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                    </ul>				
            
                   <h3 style="margin-bottom:-5px"><?php _e('Categories'); ?></h3>
        
                       <ul style="padding-left:20px important; margin-bottom:25px !important;">
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>	
					
					
					
					<?php
						$cats = get_categories();
						foreach ($cats as $cat) {
						query_posts('cat='.$cat->cat_ID);
					?>
                
					<h3 style="margin-bottom:-5px"><?php echo $cat->cat_name; ?></h3>
    
					    <ul style="padding-left:20px important; margin-bottom:25px !important;">	
                        <?php while (have_posts()) : the_post(); ?>
                        <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> -  (<?php echo $post->comment_count ?>)</li>
                        <?php endwhile;  ?>
					</ul>
            
					<?php } ?>
                    
                   <h3 style="margin-bottom:-5px"><?php _e('Метки'); ?></h3>
						     <ul style="padding-left:20px important; margin-bottom:25px !important;">
							<?php $tags = get_tags();
							if ($tags) {
								foreach ($tags as $tag) {
									echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a> ';
								}
							} ?>
						</ul>
                        
                      
                        
                        	
                         
			</div>	</div>	
			       


<?php get_sidebar(); ?>	
	
<?php get_footer(); ?>