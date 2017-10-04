


<div class="units-row" style="padding:35px 25px 25px 25px;  background-color:#414246;color:#e9e9e9; font-size:15px; line-height:22px">
   
    
    <div class="unit-33" >
 
  <span style="margin-bottom:15px; display:block;"><?php echo get_option('BUSINESS_TIME_searh_text'); ?></span>
 <form method="get" id="search-form" class="search-form clearfix" action="<?php bloginfo('siteurl')?>">                            
        <input type="text" onBlur="if ('' === this.value)
                    this.value = this.defaultValue;" onFocus="if (this.defaultValue === this.value)
                    this.value = '';" value="Поиск..." name="s" class="search-text" maxlength="20">
        <input type="submit" value="Мне повезет" name="" class="search-submit">
    </form><!-- search-form --> 
   
 </div>
    
    
    
   <div class="unit-33"> 
   <div align="center">
    <ul style="list-style:none; font-family: 'Tinos', serif; font-size:15px;">
   
 <li><i class="fa fa-phone"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_pfone'); ?></li>
  <li><i class="fa fa-home"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_sity'); ?> </li>
 <li><i class="fa fa-at"></i>&nbsp; <?php echo get_option('BUSINESS_TIME_mail'); ?></li>

    </ul>
     </div>
  </div> 
    
    
    
    <div class="unit-33">
    
    <span style="margin-bottom:15px; display:block;"><?php echo get_option('BUSINESS_TIME_subscribe_text'); ?></span> 
    
    <form class="newsletter-form clearfix" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo get_option('BUSINESS_TIME_feedburner'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
            
            <input type="hidden" value="KopathemePremiumWordpressThemesAndWebTemplate" name="uri"/>
            
            <p class="input-email clearfix">
                <input type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" name="email" value="Подписка на обновление" class="email" size="40">
                <input type="submit" value="Подписаться" class="submit">
            </p>

        </form>
 
  
 
 
    </div>
    
  
   
</div>







<div class="units-row" style="padding:20px 25px 20px 25px;  background-color:#2f3033;color:#e9e9e9; font-size:15px; line-height:22px; margin-top:-25px; ">
    <div class="unit-73 coperayt" style="color:#e2e2e2;"><?php echo get_option('BUSINESS_TIME_foter_text'); ?></div>
    <div class="unit-27 icons"><div align="center">
  
     <a data-placement="top" 
  data-toggle="tooltip" 
  data-original-title="Twitter" href="<?php echo get_option('BUSINESS_TIME_Twitter'); ?>" > <i class="fa fa-twitter fa-lg " style=" background-color:#383a3f;
    box-shadow:0 1px 0 #535354;
    -moz-box-shadow:0 1px 0 #535354;
    -webkit-box-shadow:0 1px 0 #535354; padding:12px 10px 12px 10px; "></i></a>

<a data-placement="top" 
  data-toggle="tooltip" 
  data-original-title="vk" href="<?php echo get_option('BUSINESS_TIME_vk'); ?>" ><i class="fa fa-vk fa-lg " style="  padding:12px 9px 12px 8px;background-color:#383a3f;
    box-shadow:0 1px 0 #535354;
    -moz-box-shadow:0 1px 0 #535354;
    -webkit-box-shadow:0 1px 0 #535354;"></i></a>


    



      <a data-placement="top" 
  data-toggle="tooltip" 
  data-original-title="Google+" href="<?php echo get_option('BUSINESS_TIME_Google'); ?>" ><i class="fa fa-google-plus fa-lg " style="  padding:12px 10px 12px 10px;background-color:#383a3f;
    box-shadow:0 1px 0 #535354;
    -moz-box-shadow:0 1px 0 #535354;
    -webkit-box-shadow:0 1px 0 #535354;"></i></a>


       <a data-placement="top" 
  data-toggle="tooltip" 
  data-original-title="Facebook" href="<?php echo get_option('BUSINESS_TIME_Facebook'); ?>" ><i class="fa fa-facebook fa-lg " style=" 
   padding:12px 13px 12px 13px;background-color:#383a3f;
    box-shadow:0 1px 0 #535354;
    -moz-box-shadow:0 1px 0 #535354;
    -webkit-box-shadow:0 1px 0 #535354;"></i></a>


     <a data-placement="top" 
  data-toggle="tooltip" 
  data-original-title="YouTube" href="<?php echo get_option('BUSINESS_TIME_YouTube'); ?>" > <i class="fa fa-youtube fa-lg " style="  padding:12px 11px 12px 11px;background-color:#383a3f;
    box-shadow:0 1px 0 #535354;
    -moz-box-shadow:0 1px 0 #535354;
    -webkit-box-shadow:0 1px 0 #535354;"></i></a>
      </div></div>
</div>








</div>
<?php if (get_option('BUSINESS_TIME_analytics') <> ""){
echo stripslashes(stripslashes(get_option('BUSINESS_TIME_analytics')));
}else{
echo '';
}?>   

<?php wp_footer();?> 

 

</body>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.9.0.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/easyResponsiveTabs.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tooltip.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>


 <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });




        
    });
</script>
  <script type="text/javascript">
    $(document).ready(function () {
        
$(".content_5").mCustomScrollbar({
					horizontalScroll:true,
					scrollButtons:{
						enable:true
					},
					theme:"dark-thin"
				});

        
    });
</script> 
    
 <script type="text/javascript">
jQuery(document).ready(function($) {
$('.flexslider').flexslider({
           animation: "slide",
		   controlNav: false
		  
    });
});
</script>
</html>


