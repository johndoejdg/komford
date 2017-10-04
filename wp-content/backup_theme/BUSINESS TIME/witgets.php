<?php
/*архивы*/
add_action( 'widgets_init', 'rot_widget_archive_widget' );
function rot_widget_archive_widget() {
	register_widget( 'rot_widget_archive_Widget' );
}
class rot_widget_archive_Widget extends WP_Widget {

function rot_widget_archive_Widget() {
$widget_ops = array('classname' => 'widget_archive', 'description' => __( 'A monthly archive of your site&#8217;s Posts.') );
parent::__construct('archives', __('Archives'), $widget_ops);
}

function widget( $args, $instance ) {
		extract($args);
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;
if ( $title ){ ?>
 <h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}	

		if ( $d ) {
?>
		<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=""><?php echo esc_attr(__('Select Month')); ?></option> <?php wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'option', 'show_post_count' => $c))); ?> </select>
<?php
		} else {
?>
		<ul>
		<?php wp_get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'show_post_count' => $c))); ?>
		</ul>
<?php
		}

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$instance['title'] = strip_tags($new_instance['title']);
		
		
		
		$instance['count'] = $new_instance['count'] ? 1 : 0;
		$instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance,  array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$title = strip_tags($instance['title']);
		$count = $instance['count'] ? 'checked="checked"' : '';
		$dropdown = $instance['dropdown'] ? 'checked="checked"' : '';
?>

<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $dropdown; ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
			<br/>
			<input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
		</p>
<?php
	}
}

	

/*текст*/

add_action( 'widgets_init', 'rot_widget_text_widget' );
function rot_widget_text_widget() {
	register_widget( 'rot_widget_text_Widget' );
}

class rot_widget_text_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_text', 'description' => __('Arbitrary text or HTML.'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('text', __('Text'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		
			$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0">  <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}	

$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget; ?>
			<p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
	}
}





/*категории*/

add_action( 'widgets_init', 'rot_widget_categories_widget' );
function rot_widget_categories_widget() {
	register_widget( 'rot_widget_categories_Widget' );
}
class rot_widget_categories_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => __( "A list or dropdown of categories." ) );
		parent::__construct('categories', __('Categories'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Categories' ) : $instance['title'], $instance, $this->id_base);
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

		echo $before_widget;
		
			
			
				$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		
		echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0;"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}
			
			
			

		$cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h);

		if ( $d ) {
			$cat_args['show_option_none'] = __('Select Category');
			wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
?>

<script type='text/javascript'>
/* <![CDATA[ */
	var dropdown = document.getElementById("cat");
	function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
	}
	dropdown.onchange = onCatChange;
/* ]]> */
</script>

<?php
		} else {
?>
		<ul>
<?php
		$cat_args['title_li'] = '';
		wp_list_categories(apply_filters('widget_categories_args', $cat_args));
?>
		</ul>
<?php
		}

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
		<label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy' ); ?></label></p>
<?php
	}

}


/*метки*/


add_action( 'widgets_init', 'rot_tag_cloud_widget' );
function rot_tag_cloud_widget() {
	register_widget( 'rot_tag_cloud_Widget' );
}
class rot_tag_cloud_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array( 'description' => __( "A cloud of your most used tags.") );
		parent::__construct('tag_cloud', __('Tag Cloud'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = __('Tags');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}
			
			
			
			
		echo '<div class="tagcloud">';
		wp_tag_cloud( apply_filters('widget_tag_cloud_args', array('taxonomy' => $current_taxonomy) ) );
		echo "</div>\n";
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		return $instance;
	}

	function form( $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:') ?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
	<?php foreach ( get_taxonomies() as $taxonomy ) :
				$tax = get_taxonomy($taxonomy);
				if ( !$tax->show_tagcloud || empty($tax->labels->name) )
					continue;
	?>
		<option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo $tax->labels->name; ?></option>
	<?php endforeach; ?>
	</select></p><?php
	}

	function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}
		




/*популярные записи*/

add_action( 'widgets_init', 'rot_load_popular_posts_widget' );

function rot_load_popular_posts_widget() {
	register_widget( 'rot_Popular_Posts_Widget' );
}
function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)."...";
echo $excerpt;
}


class rot_Popular_Posts_Widget extends WP_Widget {
function rot_Popular_Posts_Widget() {
$widget_ops = array( 'classname' => 'widget-posts widget-popular-posts', 'description' => 'Покажет самые популярные записи' );
$control_ops = array( 'id_base' => 'rot-popular-posts-widget' );
$this->WP_Widget( 'rot-popular-posts-widget', 'Популярные записи', $widget_ops, $control_ops );
	}

function widget( $args, $instance ) {
		extract( $args );
$numberposts = $instance['numberposts'];
echo $before_widget;
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Популярные записи' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}

?>
                
                <div class="widget_wrap">
                <ul>
                <?php query_posts( 'orderby=comment_count&posts_per_page='.$numberposts ) ?>
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <li>
                  
                   
                    <?php
if ( has_post_thumbnail()) {
//the_post_thumbnail();?> 
<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=50&w=50&zc=1" alt="<?php the_title(); ?>" width="50" height="50" style="float:left; margin:0 10px 0 0;border: 1px solid #E9E9E9;
    border-radius: 3px 3px 3px 3px;
	padding:4px; "   >

<?php } ?> <a  href="<?php the_permalink();?>"><?php $short_title = mb_substr(the_title('','',FALSE),0,65);
echo $short_title; if (strlen($short_title) >58){ echo '...'; } ?>	</a>
<div class="post-meta" style="font-size:12px;">
	<i class="fa  fa-calendar fa-fw"></i> <?php the_time('d.m.Y') ?> &nbsp;<i class="fa  fa-comments fa-fw"></i> <?php comments_number( '0', '1', '%' ); ?>  
	</div>

                  

                    
				<?php endwhile ?>
                <?php endif ?>
                <?php wp_reset_query(); ?></li></ul></div>

                                

<?php
		echo $after_widget;
	}
function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
	
$instance['title'] = strip_tags($new_instance['title']);		
$instance['numberposts'] = (int) $new_instance['numberposts'];
return $instance;
	}
	
	
function form( $instance ) {
$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';	
$numberposts    = isset( $instance['numberposts'] ) ? absint( $instance['numberposts'] ) : 5;	

$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>


<p>
<label for="<?php echo $this->get_field_id( 'numberposts' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'numberposts' ); ?>" name="<?php echo $this->get_field_name( 'numberposts' ); ?>" type="text" value="<?php echo $numberposts; ?>" size="3" />
		</p>

	<?php
	}
}



/*Случайные записи'*/

add_action( 'widgets_init', 'rot_load_random_posts_widget' );

function rot_load_random_posts_widget() {
	register_widget( 'rot_Random_Posts_Widget' );
}

class rot_random_Posts_Widget extends WP_Widget {
function rot_random_Posts_Widget() {
$widget_ops = array( 'classname' => 'widget-posts widget-random-posts', 'description' => 'Покажет случайные записи' );
$control_ops = array( 'id_base' => 'rot-random-posts-widget' );
$this->WP_Widget( 'rot-random-posts-widget', 'Случайные записи', $widget_ops, $control_ops );
	}

function widget( $args, $instance ) {
		extract( $args );
$numberposts = $instance['numberposts'];
echo $before_widget;
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Случайные записи' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}

?>


 
                
              
                <ul>
                <?php query_posts( 'orderby=rand&posts_per_page='.$numberposts ) ?>
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <li>
                  
                   
                    <?php
if ( has_post_thumbnail()) {
//the_post_thumbnail();?> 
<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=50&w=50&zc=1" alt="<?php the_title(); ?>" width="50" height="50" style="float:left; margin:0 10px 0 0;border: 1px solid #E9E9E9;
    border-radius: 3px 3px 3px 3px;
	padding:4px; "   >

<?php } ?> <a  href="<?php the_permalink();?>"><?php $short_title = mb_substr(the_title('','',FALSE),0,65);
echo $short_title; if (strlen($short_title) >58){ echo '...'; } ?>	</a>
<div class="post-meta" style="font-size:12px;">
	<i class="fa  fa-calendar fa-fw"></i> <?php the_time('d.m.Y') ?> &nbsp;<i class="fa  fa-comments fa-fw"></i> <?php comments_number( '0', '1', '%' ); ?>  
	</div>
                    
				<?php endwhile ?>
                <?php endif ?>
                <?php wp_reset_query(); ?></li></ul>

                                

<?php
		echo $after_widget;
	}
function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
	
$instance['title'] = strip_tags($new_instance['title']);		
$instance['numberposts'] = (int) $new_instance['numberposts'];
return $instance;
	}
	
	
function form( $instance ) {
$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';	
$numberposts    = isset( $instance['numberposts'] ) ? absint( $instance['numberposts'] ) : 5;	

$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>


<p>
<label for="<?php echo $this->get_field_id( 'numberposts' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'numberposts' ); ?>" name="<?php echo $this->get_field_name( 'numberposts' ); ?>" type="text" value="<?php echo $numberposts; ?>" size="3" />
		</p>

	<?php
	}
}





/*комментарии*/

add_action( 'widgets_init', 'rot_resentcoments_widget' );
function rot_resentcoments_widget() {
	register_widget( 'rot_resentcoments_Widget' );
}
class rot_resentcoments_Widget extends WP_Widget {
function rot_resentcoments_Widget() {
$widget_ops = array( 'classname' => 'widget_resentcoments', 'description' => 'Покажет самые новые комментарии с отоброжением аваторов' );
$this->WP_Widget( 'rot_resentcoments_widget', 'Свежие комментарии', $widget_ops, $control_ops );
	}
function widget( $args, $instance ) {
		extract( $args );
$title = apply_filters('widget_title', $instance['title'] );
echo $before_widget;
if ( $title ){ ?>
<h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px"><?php echo $title; ?></span></h3>
<?php	}	?>
<?php get_avatar_recent_comment(); ?>        
                
<?php
		echo $after_widget;
	}

function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
			
		return $instance;
	}

	function form( $instance ) {
$defaults = array(
		'title' => 'Свежие комментарии ',
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		
	<?php
	}
}
		



?>