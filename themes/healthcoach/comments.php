<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<?php $protocol = is_ssl() ? 'https://' : 'http://';?>
<div itemscope itemtype="<?php echo esc_attr($protocol);?>schema.org/Comment" id="comments" class="post-comments comment-area clearfix">
	<?php if ( have_comments() ) : ?>
	 <div class="comments-area">
        <div class="sec-title"><h2><?php comments_number();?></h2><div class="separator"></div></div>
        
        <div class="comment-box">
            <?php
				wp_list_comments( array(
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'=>'healthcoach_bunch_list_comments'
				) );
			?>
            
        </div>
        <?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
        <nav class="navigation comment-navigation clearfix" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'healthcoach' ); ?></h1>
            <div class="nav-previous pull-left"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'healthcoach' ) ); ?></div>
            <div class="nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'healthcoach' ) ); ?></div>
        </nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'healthcoach' ); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; // have_comments() ?> 
     
    <?php if ( comments_open()) : ?>
    <!-- Comment Form -->
    <div class="comment-form">
        <!-- Heading -->
        
       <?php healthcoach_bunch_comment_form(); ?>
    </div>
    <?php endif; ?>	    
</div><!-- #comments -->
