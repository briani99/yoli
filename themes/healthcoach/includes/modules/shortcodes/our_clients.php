<?php  
ob_start() ;
$options = _WSH()->option();
?>

<section class="clients-section">
	<div class="container">
		<div class="client-carousel owl-carousel owl-theme">
			<?php if($clients = healthcoach_set(healthcoach_set($options, 'clients'), 'clients')):?>
			<?php foreach($clients as $key => $value):?>
				<?php if(healthcoach_set($value, 'tocopy')) continue;?>
                <div class="item"><a href="<?php echo esc_url(healthcoach_set($value, 'client_link'));?>"><?php echo balanceTags(wp_get_attachment_image( bunch_get_attachment_id_by_url( healthcoach_set($value, 'client_img') ), 'full', "", array( "class" => "img-responsive" ) ));  ?></a></div>
                <?php endforeach;?>
        	<?php endif;?>
		</div>
	</div>	
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   