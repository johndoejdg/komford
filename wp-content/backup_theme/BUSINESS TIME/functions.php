<?php
add_theme_support( 'woocommerce' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
require_once(TEMPLATEPATH . '/witgets.php');
require_once(TEMPLATEPATH . '/admin/admin-functions.php');
 require_once(TEMPLATEPATH . '/admin/admin-interface.php');
 require_once(TEMPLATEPATH . '/admin/theme-settings.php'); 





register_nav_menus(array(
'top' => 'Верхнее меню'
));


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 254, 150, false );
add_image_size('featured-post-thumbnail',430,280,true);
add_image_size('slider-thumbnail',795,290,true);

function get_image_path ($post_id = null) {
	if ($post_id == null) {
		global $post;
		$post_id = $post->ID;
	}
	$theImageSrc = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $theImageSrc);
		if (isset($imageParts[1])) {
			$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $theImageSrc;
}



function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);





function true_russian_date_forms($the_date = '') {
    if ( substr_count($the_date , '---') > 0 ) {
        return str_replace('---', '', $the_date);
    }
    $replacements = array(
        "Январь" => "января",
        "Февраль" => "февраля",
        "Март" => "марта",
        "Апрель" => "апреля",
        "Май" => "мая",
        "Июнь" => "июня",
        "Июль" => "июля",
        "Август" => "августа",
        "Сентябрь" => "сентября",
        "Октябрь" => "октября",
        "Ноябрь" => "ноября",
        "Декабрь" => "декабря"
    );
    return strtr($the_date, $replacements);
}


function kama_postviews() {  
  

$meta_key       = 'views'; 
$who_count      = 1;         
$exclude_bots   = 1;           
  
global $user_ID, $post;  
    if(is_single() || is_page()) {  
        $id = intval($post->ID);  
        $post_views = intval(get_post_meta($id,$meta_key, true)); 
        $should_count = false;  
        switch(intval($who_count)) {  
            case 0: $should_count = true;  
                break;  
            case 1:  
                if(intval($user_ID) == 0)  
                    $should_count = true;  
                break;  
            case 2:  
                if(intval($user_ID) > 0)  
                    $should_count = true;  
                break;  
        }  
        if(intval($exclude_bots) == 1 && $should_count) {  
            $useragent = $_SERVER['HTTP_USER_AGENT'];  
            $notbot = "Mozilla|Opera|Dillo"; 
            $bot = "Bot/|robot|Slurp/|yahoo"; 
            if ( preg_match("!$bot!i", $useragent) || !preg_match("/$notbot/i", $useragent) ) $should_count=false;  
  
        }  
  
        if($should_count)  
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);  
    }  
}  
add_action('wp_head', 'kama_postviews');  





function kama_get_most_viewed($args=''){  
    parse_str($args, $i);  
    $num    = isset($i['num']) ? $i['num']:10;  
    $key    = isset($i['key']) ? $i['key']:'views';  
    $order  = isset($i['order']) ? 'ASC':'DESC';  
    $cache  = isset($i['cache']) ? 1:0;  
    $echo   = isset($i['echo']) ? 0:1;  
    $format = isset($i['format']) ? stripslashes($i['format']):0;  
    global $wpdb,$post;  
    $cur_postID = $post->ID;  
  
    if ($cache){ $cache_key = (string) md5( __FUNCTION__ . serialize($args) );  
        if ( $cache_out = wp_cache_get($cache_key) ){  
            if ($echo) return print($cache_out); else return $cache_out;  
        }  
    }  
  
    $sql = "SELECT p.ID, p.post_title, p.post_date, p.guid, p.comment_count, (pm.meta_value+0) AS views 
    FROM $wpdb->posts p 
        LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID) 
    WHERE pm.meta_key = '$key' 
        AND p.post_type = 'post' 
        AND p.post_status = 'publish' 
    ORDER BY views $order LIMIT $num";  
    $results = $wpdb->get_results($sql);  
    if (!$results) return false;  
  
    $out= '';  
    preg_match ('!\{date:(.*?)\}!',$format,$date_m);  
    foreach ($results as $pst){  
        $x == 'li1' ? $x = 'li2' : $x = 'li1';  
        if ( (int)$pst->ID == (int)$cur_postID ) $x .= " current-item";  
        $Title = $pst->post_title;  
        $a1 = "<a href='". get_permalink($pst->ID) ."' title='{$pst->views} ??????????: $Title'>";  
        $a2 = "</a>";  
        $comments = $pst->comment_count;  
        $views = $pst->views;  
        if ($format){  
            $date = apply_filters('the_time', mysql2date($date_m[1],$pst->post_date));  
            $Sformat = str_replace ($date_m[0], $date, $format);  
            $Sformat = str_replace(array('{a}','{title}','{/a}','{comments}','{views}'), array($a1,$Title,$a2,$comments,$views), $Sformat);  
        }  
        else $Sformat = $a1.$Title.$a2;  
        $out .= "\n<li class='$x'>$Sformat</li>";  
    }  
  
    if ($cache) wp_cache_add($cache_key, $out);  
  
    if($echo) return print $out; else return $out;  
}

function remove_header_admin () {
echo '<div class="inner_copy"><a href="http://www.wp-city.ru">Разработка индивидуального дизайна</a></div>  ';
} 
add_filter('admin_header_text', 'remove_header_admin');

function Maximus_comment($comment, $args, $depth) {

    $isByAuthor = false;

    if($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    }

    $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
     <div id="comment-<?php comment_ID(); ?>" class="comment-body clear">
     
      <?php echo get_avatar($comment,$size='55'); ?>
      
      <div class="comment-author vcard">
         <?php printf(__('%s'), get_comment_author_link()) ?> 
		 <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Автор)') ?></span><?php } ?>
      </div>

      <div class="comment-meta commentmetadata">
	  	<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
		<?php edit_comment_link(__('(Редактировать)'),'  ','') ?> &middot; 
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
<div class="comment-inner">
<?php if ($comment->comment_approved == '0') : ?>
<em class="moderation"><?php _e('Ваш комментарий отправлен на проверку.') ?></em>
<br />
<?php endif; ?>
<?php comment_text() ?>
</div>
</div>
<?php
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	    'name' => 'Сайтбар', 
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 style="margin:0 0 -15px 0"> <span style="border-bottom:1px solid #de462a; width:100%; display:block; padding-bottom:3px">',
		'after_title' => '</span></h3>',
	));
}


/*сылка на настройку темы*/
add_action( 'wp_before_admin_bar_render', 'optionsframework_adminbar' );

function optionsframework_adminbar() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'of_theme_options',
		'title' => __( 'Настроить тему BUSINESS TIME' ),
		'href' => admin_url( 'admin.php?page=siteoptions' )
  ));
 
}

function remove_footer_admin () {
    echo '<div class="inner_copy"><span style="font-style:italic; ">Тема создана проектом <a href="http://www.wp-city.ru">www.wp-city.ru</a>  Создание индивидуального дизайна для Вас!</span></div>  ';
} 
add_filter('admin_footer_text', 'remove_footer_admin');


function get_avatar_recent_comment() {

global $wpdb;

$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,80) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC LIMIT 5";

$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
$gravatar_status = 'on'; /* off if not using */

foreach ($comments as $comment) {
$email = $comment->comment_author_email;
$grav_name = $comment->comment_author;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&amp;size=32"; ?>



               



      

        
     <li  style="padding:7px 0 7px 0; margin:0; list-style:none;">
<div style="float:left; margin:0 10px 0 0;border: 1px solid #E9E9E9;
    border-radius: 3px 3px 3px 3px;
	padding:3px 3px 0px 3px;"><?php echo get_avatar($comment,$size='35'); ?></div><a style="color:#000" href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title=" <?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->comment_author); ?>:</a><br /> <span style="font-size:15px; margin:0 0 -30px 0;"><?php echo strip_tags($comment->com_excerpt); ?>...</span> <br /> 
    
    
    
    
    
    
  <div class="post-meta" style="font-size:12px; ">
	<i class="fa  fa-calendar fa-fw"></i> <?php the_time('d.m.Y') ?> &nbsp;<i class="fa  fa-clock-o fa-fw"></i> <?php the_time( $d ); ?>&nbsp; <i class="fa  fa-folder-open fa-fw"></i> <?php the_category(', '); ?>
	</div>  
    
    
    
</li>



               




<?php

}
}



// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
    add_meta_box( 'extra_fields', 'Настройки Сео', 'extra_fields_box_func', 'post', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func( $post ){
?>
	<p>Заголовок страницы (title) не более 60 знаков:
    <label><input type="text" name="extra[title]" value="<?php echo get_post_meta($post->ID, 'title', 1); ?>" style="width:80%" /> </label></p>

	<p>Описание статьи (description) не более 150 знаков:
		<textarea type="text" name="extra[description]" style="width:80%;height:70px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
	</p>
    
    
   <p>Ключи (keywords) через запятую, 3-5 не более:
    <label><input type="text" name="extra[keywords]" value="<?php echo get_post_meta($post->ID, 'keywords', 1); ?>" style="width:80%" /> </label></p>
 
    

	<p>Видимость поста:<br /> <?php $mark_v = get_post_meta($post->ID, 'robotmeta', 1); ?>
		 <label><input type="radio" name="extra[robotmeta]" value="" <?php checked( $mark_v, '' ); ?> /> index,follow</label>
		 <label><input type="radio" name="extra[robotmeta]" value="nofollow" <?php checked( $mark_v, 'nofollow' ); ?> /> nofollow</label>
		 <label><input type="radio" name="extra[robotmeta]" value="noindex" <?php checked( $mark_v, 'noindex' ); ?> /> noindex</label>
		 <label><input type="radio" name="extra[robotmeta]" value="noindex,nofollow" <?php checked( $mark_v, 'noindex,nofollow' ); ?> /> noindex,nofollow</label>
	</p>
<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){
    if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}






?>