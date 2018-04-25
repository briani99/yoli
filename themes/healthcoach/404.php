<?php
$options = _WSH()->option();
    get_header(); 
?>
<!--Page Title-->
<section class="page-title" style="background-image:url('<?php echo esc_url(get_template_directory_uri(). '/images/background/bg-page-title-1.jpg')?>');">
    <div class="auto-container">
        <h1><?php esc_html_e('404 Error Page', 'healthcoach')?></h1>
    </div>
</section>

<!--  Your page Content End Here -->
<div class="error_page container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <!-- /.shop aside use for styling input search box -->
            <div class="page-error">
                <p><?php esc_html_e('The page you are looking for no longer exists. Perhaps you can return back to the sites homepage and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'healthcoach');?></p>
                <div class="sidebar">
                    <div class="search-box"> <!--input-group -->
                        <div class="form-group">
                            <?php get_template_part( 'searchform3' ); ?>
                        </div><!-- /input-group -->
                    </div>
                </div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one error-btn"><?php esc_html_e('Back to Home', 'healthcoach')?> </a>
        	</div>
        </div>
	</div> <!-- /row -->
</div>
<!--  Your Blog Content End Here -->  		
<?php get_footer(); ?>