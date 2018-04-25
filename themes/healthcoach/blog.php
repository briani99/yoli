<!--News Style One-->
<div class="news-style-one">
    <div class="inner-box">
        <?php if ( has_post_thumbnail() ):?>
        <figure class="image-box">
        	<a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
            <?php the_post_thumbnail('healthcoach_1170x500');?>
            </a>
        </figure>
        <?php endif;?>
        <div class="lower-content">
            <div class="posted-info"><?php echo get_the_date('F d, Y')?></div>
            <ul class="post-meta clearfix">
                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><span class="icon fa fa-user"></span>  <?php the_author();?> </a></li>
                <?php if(get_the_category()):?>
                <li><span class="icon fa fa-tags"></span> <?php the_category('',', ',''); ?></li>
                <?php endif;?>
                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comment');?>"><span class="icon fa fa-comments"></span> <?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></li>
            </ul>
            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
            <div class="text"><?php the_excerpt();?></div>
        </div>
    </div>
</div>