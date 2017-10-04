<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "BUSINESS_TIME";


//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Выберите категорию:");


//Sample Array for demo purposes
$sample_array = array("1","2","3","4","5");


//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 


//Folder Paths for "type" => "images"



       

$SL1 =  get_template_directory_uri() . '/images/slayd/slayd1.jpg';      
$SL2 =  get_template_directory_uri() . '/images/slayd/slayd2.jpg';  
$SL3 =  get_template_directory_uri() . '/images/slayd/slayd3.jpg';  
$SL4 =  get_template_directory_uri() . '/images/slayd/slayd4.jpg'; 
$SL5 =  get_template_directory_uri() . '/images/slayd/slayd5.jpg';      
 

/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall


			
			
	/* Option Page 3 - foter */
$options[] = array( "name" => __('Главная страница','framework_localize'),
			"sicon" => "glyphicons_019_cogwheel.png",					 
			"type" => "heading");
			
			
		$options[] = array( "name" => __('Иконка Favicon','framework_localize'),
			"desc" => __('Загрузите favicon иконку,размером 16px x 16px ','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "$faviconurl",
			"type" => "upload");	
			
			

$options[] = array( "name" => __('Блок приветствия на главной странице','framework_localize'),
			"desc" => "Напишите небольшое приветствие для пользователей Вашего сайта",
			"id" => $shortname."_welcome",
			"std" => "Напишите небольшое приветствие для пользователей Вашего сайта!",
			"type" => "textarea");







$options[] = array( "name" => __('Заголовок 1 блока','framework_localize'),
			"desc" => "Заголовок 1 блока",
			"id" => $shortname."_blok1title",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Текст на ссылке 1 блока','framework_localize'),
			"desc" => "Текст на ссылке 1 блока",
			"id" => $shortname."_linktitle",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('URL ссылки 1 блока','framework_localize'),
			"desc" => "URL ссылки 1 блока",
			"id" => $shortname."_link1",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Описание 1 блока','framework_localize'),
			"desc" => "Описание 1 блока",
			"id" => $shortname."_blok1opis",
			"std" => "",
			"type" => "textarea");


$options[] = array( "name" => __('Заголовок 2 блока','framework_localize'),
			"desc" => "Заголовок 2 блока",
			"id" => $shortname."_blok2title",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Текст на ссылке 2 блока','framework_localize'),
			"desc" => "Текст на ссылке 2 блока",
			"id" => $shortname."_linktitle2",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('URL ссылки 2 блока','framework_localize'),
			"desc" => "URL ссылки 2 блока",
			"id" => $shortname."_link2",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Описание 2 блока','framework_localize'),
			"desc" => "Описание 2 блока",
			"id" => $shortname."_blok2opis",
			"std" => "",
			"type" => "textarea");





$options[] = array( "name" => __('Заголовок 3 блока','framework_localize'),
			"desc" => "Заголовок 3 блока",
			"id" => $shortname."_blok3title",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Текст на ссылке 3 блока','framework_localize'),
			"desc" => "Текст на ссылке 3 блока",
			"id" => $shortname."_linktitle3",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('URL ссылки 3 блока','framework_localize'),
			"desc" => "URL ссылки 3 блока",
			"id" => $shortname."_link3",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Описание 3 блока','framework_localize'),
			"desc" => "Описание 3 блока",
			"id" => $shortname."_blok3opis",
			"std" => "",
			"type" => "textarea");








	
/* Option Page 3 - slayder */
$options[] = array( "name" => __('Слайдер','framework_localize'),
			"sicon" => "glyphicons_086_display.png",					 
			"type" => "heading");




$options[] = array( "name" => __('Заголовок 1слайда','framework_localize'),
			"desc" => "Заголовок 1слайда",
			"id" => $shortname."_slaydtitle",
			"std" => "Заголовок 1слайда",
			"type" => "text");
	
$options[] = array( "name" => __('Картинка 1слайда','framework_localize'),
			"desc" =>  "Размер картинки должен быть не менее 1018рх на 460рх",
			"id" => $shortname."_slayd",
			"std" => "$SL1",
			"type" => "upload");



$options[] = array( "name" => __('Заголовок 2слайда','framework_localize'),
			"desc" => "Заголовок 2слайда",
			"id" => $shortname."_slayd1title",
			"std" => "Заголовок 2слайда",
			"type" => "text");

$options[] = array( "name" => __('Картинка 2слайда','framework_localize'),
			"desc" =>  "Размер картинки должен быть не менее 1018рх на 460рх",
			"id" => $shortname."_slayd1",
			"std" => "$SL2",
			"type" => "upload");





$options[] = array( "name" => __('Заголовок 3слайда','framework_localize'),
			"desc" => "Заголовок 3слайда",
			"id" => $shortname."_slayd3title",
			"std" => "Заголовок 3слайда",
			"type" => "text");
	
$options[] = array( "name" => __('Картинка 3слайда','framework_localize'),
			"desc" =>  "Размер картинки должен быть не менее 1018рх на 460рх",
			"id" => $shortname."_slayd3",
			"std" => "$SL3",
			"type" => "upload");




$options[] = array( "name" => __('Заголовок 4слайда','framework_localize'),
			"desc" => "Заголовок 4слайда",
			"id" => $shortname."_slayd4title",
			"std" => "Заголовок 4слайда",
			"type" => "text");

$options[] = array( "name" => __('Картинка 4слайда','framework_localize'),
			"desc" =>  "Размер картинки должен быть не менее 1018рх на 460рх",
			"id" => $shortname."_slayd4",
			"std" => "$SL4",
			"type" => "upload");




$options[] = array( "name" => __('Заголовок 5слайда','framework_localize'),
			"desc" => "Заголовок 5слайда",
			"id" => $shortname."_slayd5title",
			"std" => "Заголовок 5слайда",
			"type" => "text");
	
$options[] = array( "name" => __('Картинка 5слайда','framework_localize'),
			"desc" =>  "Размер картинки должен быть не менее 1018рх на 460рх",
			"id" => $shortname."_slayd5",
			"std" => "$SL5",
			"type" => "upload");	





/* Option Page 3 - Metta */
$options[] = array( "name" => __('Мета','framework_localize'),
			"sicon" => "glyphicons_066_tags.png",					 
			"type" => "heading");





$options[] = array( "name" => __('Проверочный метта тег Яндекса','framework_localize'),
			"desc" => "Проверочный метта тег Яндекса",
			"id" => $shortname."_yandex_tag",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => __('Проверочный метта тег google','framework_localize'),
			"desc" => "Проверочный метта тег google",
			"id" => $shortname."_google_tag",
			"std" => "",
			"type" => "textarea");

			
$options[] = array( "name" => __('Ключевые слова (keywords)','framework_localize'),
			"desc" => "Вводите слова через запятую.",
			"id" => $shortname."_keywords",
			"std" => "",
			"type" => "textarea");


$options[] = array( "name" => __('Описание (description)','framework_localize'),
			"desc" => "Описание (description)",
			"id" => $shortname."_description",
			"std" => "",
			"type" => "textarea");




/* Option Page 3 - foter */
$options[] = array( "name" => __('Футер','framework_localize'),
			"sicon" => "glyphicons_030_pencil.png",					 
			"type" => "heading");


$options[] = array( "name" => __('Укажите страну и город компании','framework_localize'),
			"desc" => "Укажите страну и город проживания",
			"id" => $shortname."_sity",
			"std" => "Санкт Питербург",
			"type" => "text");

$options[] = array( "name" => __('Укажите телефон  компании','framework_localize'),
			"desc" => "Укажите телефон  компании",
			"id" => $shortname."_pfone",
			"std" => "+7 420-300-3850",
			"type" => "text");


$options[] = array( "name" => __('Укажите e-mail  компании','framework_localize'),
			"desc" => "Укажите e-mail  компании",
			"id" => $shortname."_mail",
			"std" => "info@wp-city.ru",
			"type" => "text");




$options[] = array( "name" => __('Копирайт текст','framework_localize'),
			"desc" => "Пропишите текст копирайта в адинистративной части!",
			"id" => $shortname."_foter_text",
			"std" => "",
			"type" => "textarea");



$options[] = array( "name" => __('Укажите ссылку Twitter ','framework_localize'),
			"desc" => "Укажите ссылку Twitter",
			"id" => $shortname."_Twitter",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Укажите ссылку vk','framework_localize'),
			"desc" => "Укажите ссылку vk'",
			"id" => $shortname."_vk",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Укажите ссылку Google+','framework_localize'),
			"desc" => "Укажите ссылку Google+",
			"id" => $shortname."_Google",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Укажите ссылку Facebook ','framework_localize'),
			"desc" => "Укажите ссылку Facebook",
			"id" => $shortname."_Facebook ",
			"std" => "",
			"type" => "text");


$options[] = array( "name" => __('Укажите ссылку YouTube ','framework_localize'),
			"desc" => "Укажите ссылку YouTube",
			"id" => $shortname."_YouTube",
			"std" => "",
			"type" => "text");




$options[] = array( "name" => __('Текст под поисковой формой','framework_localize'),
			"desc" => "Текст под поисковой формой",
			"id" => $shortname."_searh_text",
			"std" => "",
			"type" => "textarea");



$options[] = array( "name" => __('Текст под формой подписки','framework_localize'),
			"desc" => "Текст под формой подписки",
			"id" => $shortname."_subscribe_text",
			"std" => "",
			"type" => "textarea");



$options[] = array( "name" => __('Ваш акаунт на feedburner','framework_localize'),
			"desc" => "Ваш акаунт на feedburner",
			"id" => $shortname."_feedburner",
			"std" => "",
			"type" => "text");






/* Option Page 3 - foter */
$options[] = array( "name" => __('Статистика','framework_localize'),
			"sicon" => "glyphicons_042_pie_chart.png",							 
			"type" => "heading");




$options[] = array( "name" => __('Код Google Analytics','framework_localize'),
			"desc" => "Код Google Analytics",
			"id" => $shortname."_Analytics",
			"std" => "",
			"type" => "textarea");







update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>