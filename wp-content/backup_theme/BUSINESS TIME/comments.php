<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.') ?></p>
	<?php
		return;
	}

/* Display the comments + pings */

		if ( have_comments() ) : // if there are comments ?>
        
        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
		
		<h3 id="comments" style="margin:30px 0 0 0">
		Комментирование записи
           
        </h3>
		
		<ol class="commentlist">
        <?php wp_list_comments('type=comment&avatar_size=40&callback=Maximus_comment'); ?>
        </ol>

        <?php endif; ?>

        <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
		
		<h3 id="pings"><?php _e('Trackbacks for this post') ?></h3>
		
		<ol class="pinglist">
        <?php wp_list_comments('type=pings&callback=Maximus_list_pings'); ?>
        </ol>

        <?php endif; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link( ''); ?></div>
			<div class="alignright"><?php next_comments_link(''); ?></div>
		</div>
		
		<?php

/* Deal with no comments or closed comments */
		
		if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
		
		<p class="nocomments"><?php _e('Комментарии теперь закрыты для этой статьи.') ?></p>
		
		<?php endif; ?>

 		<?php else :  ?>
		
        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>

        <?php else : // if comments are closed ?>
		
		<?php if (is_single()) { ?><p class="nocomments"><?php _e('Комментарии закрыты.') ?></p><?php } ?>

        <?php endif; ?>
        
<?php endif;


/* Comment Form */

	if ( comments_open() ) : ?>

	<div id="respond">
		
		<h3 id="respond-title" ">
			
            
        </h3>
	
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	
   
    
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">Войти</a>, чтобы оставить комментарий.</p>

		<?php else : ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
			<?php if ( is_user_logged_in() ) : ?>
		
			<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти из аккаунта">Выйти &raquo;</a></p>
		
			<?php else : ?>
		
			<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
			<label for="author"><?php _e('Имя') ?> <small><?php if ($req) _e("*"); ?></small></label></p>
		
			<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
			<label for="email"><?php _e('Email') ?> <small><?php if ($req) _e("*"); ?></small> <span><?php _e('(Не публикуется)', 'themejunkie') ?></span></label></p>
		
			<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			<label for="url"><?php _e('Сайт') ?></label></p>
		
			<?php endif; ?>
		
			<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
			
			
		
			<p><button name="submit" type="submit" id="submit" class="buttonscom" tabindex="5"><?php _e('Отправить &rarr;') ?></button>
			<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
	
		</form>

	<?php endif; // If registration required and not logged in ?>
	</div>

	<?php endif; // if you delete this the sky will fall on your head ?>
