<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="shortcut icon" href="<?php echo get_option('BUSINESS_TIME_favicon'); ?>" />
<meta name="keywords" content="<?php echo get_option('BUSINESS_TIME_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('BUSINESS_TIME_description'); ?>" />
<?php if(get_post_meta($post->ID, 'title', 1)!=''){?>
<title><?php bloginfo('name');?> | <?php echo get_post_meta($post->ID, 'title', 1); ?></title>
<?php }else{?>
<title><?php if (is_home () ) {    bloginfo('name');} elseif ( is_category() ) {    single_cat_title(); echo ' - ' ; bloginfo('name');} elseif (is_single() ) {    single_post_title();} elseif (is_page() ) {    bloginfo('name'); echo ': '; single_post_title();} else {    wp_title('',true);} ?>
</title>
<?php }?>
<!-- Сео -->
<meta name="description" itemprop="description" content="<?php echo get_post_meta($post->ID, 'description', 1); ?>" />
<meta name="keywords" itemprop="keywords" content="<?php echo get_post_meta($post->ID, 'keywords', 1); ?>" />
<meta name="robots" content="<?php echo get_post_meta($post->ID, 'robotmeta', 1); ?>" />
<!-- /Сео -->
<?php
				// Value from Text Area
				$google_tag = get_option('BUSINESS_TIME_google_tag');
                echo stripslashes(stripslashes( $google_tag));
				?>	
<?php
				// Value from Text Area
				$yandex_tag = get_option('BUSINESS_TIME_yandex_tag');
                echo stripslashes(stripslashes( $yandex_tag));
				?>	
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />



<?php
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
remove_header_admin ();
wp_head();
?>
</head>
<body <?php body_class(); ?>>


<div id="wraper">


<div class="units-row" style="padding: 30px 25px 30px 25px; margin-bottom:0">
    <div class="unit-73 logo"><h1 style="font-size:46px; text-transform:uppercase; padding:0; color:#333"><?php bloginfo()?></h1>
   <p><?php bloginfo('description');?></p>
    </div>
    <div class="unit-27">
    <div align="center">
    <ul style="list-style:none; font-family: 'Tinos', serif; font-size:15px;">
  
 <li><i class="fa fa-phone"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_pfone'); ?></li>
  <li><i class="fa fa-home"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_sity'); ?> </li>
 <li><i class="fa fa-at"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_mail'); ?></li>

    </ul>
        </div>
    </div>
</div>





<div class="units-row" style="margin:0">
   
    <div class="unit-100">
    
    <nav>
<div align="center"><a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-th-large fa-lg"></i></a></div>
<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'navigation' ) ); ?>
</nav>
    
    </div>
   
</div>



<div class="units-row">
  
     <div class="unit-100" >
     
    
		<div class="flexslider">
	    <ul class="slides">
        
	    	<li><?php
$slayd = get_option('BUSINESS_TIME_slayd');
echo '<img src="'.$slayd.'" />';
?>
            	<div class="flex-caption">
                	 <h2><?php echo get_option('BUSINESS_TIME_slaydtitle'); ?></h2>	
                 </div>
            </li>
            
            
            <li><?php
$slayd1 = get_option('BUSINESS_TIME_slayd1');
echo '<img src="'.$slayd1.'" />';
?>
            	<div class="flex-caption">
                	 <h2><?php echo get_option('BUSINESS_TIME_slayd1title'); ?></h2>	
                  
                  </div>
            </li>
            
            
            
            <li><?php
$slayd3 = get_option('BUSINESS_TIME_slayd3');
echo '<img src="'.$slayd3.'" />';
?>
            	<div class="flex-caption">
                	 <h2><?php echo get_option('BUSINESS_TIME_slayd3title'); ?></h2>	
                  
                  </div>
            </li>
            
            
            
            
            
            <li><?php
$slayd4 = get_option('BUSINESS_TIME_slayd4');
echo '<img src="'.$slayd4.'" />';
?>
            	<div class="flex-caption">
                	 <h2><?php echo get_option('BUSINESS_TIME_slayd4title'); ?></h2>	
                
                </div>
            </li>
            
            
            <li><?php
$slayd5 = get_option('BUSINESS_TIME_slayd5');
echo '<img src="'.$slayd5.'" />';
?>
            	<div class="flex-caption">
                	 <h2><?php echo get_option('BUSINESS_TIME_slayd5title'); ?></h2>	
                
                </div>
            </li>
            
            
	    </ul>
	  </div>
   </div>
     

    
</div>
