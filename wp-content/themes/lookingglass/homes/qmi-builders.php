
<?php
	$_termArgs = array(
		'orderby'	=>	'name',
		'order'		=>	'ASC',
		'hide_empty'	=> 0
	);
	$_builders = get_terms('builder', $_termArgs);
?>

<?php foreach($_builders as $_builder): ?>
<div class="qmi-builder-info tan-bg">
	<div class="builder-section-content">
		<h2 class="builder-title"><?php echo $_builder->name ?></h2>
		<div class="builder-details">
			<?php echo $_builder->description ?>
		</div>
	</div>
</div>

<?php
	$_qmiHomes = new WP_Query();
	$_args = array(
	  'post_type' 			=> 'quickmoves',
		'builder'					=> $_builder->slug,
	  'post_status' 		=> 'publish',
	  'posts_per_page' 	=> -1,
	  'order' 					=> 'DESC',
	  'orderby' 				=> 'date'
	);
	$_qmiHomes->query($_args);
?>

<div class="builder-qmihomes-container">
	<div class="qmihomes-container">
		<?php if($_qmiHomes->have_posts()): while($_qmiHomes->have_posts()): $_qmiHomes->the_post(); $_homeImage = get_field('qmi_image'); ?>
		<article class="qmi-home">
			<figure class="home-image">
				<img src="<?php echo $_homeImage['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
			</figure>
			<div class="home-details">
				<h4 class="home-title"><?php the_title(); echo ' | ' . get_field('qmi_address'); ?></h4>
				<p class="home-price orange-txt"><?php echo '$' . get_field('qmi_price'); ?></p>
				<p class="home-information">
					<?php echo get_field('qmi_square_footage') . ' sq ft | ' . get_field('qmi_bedrooms') . ' beds | ' . get_field('qmi_bathrooms') . ' baths<br/>' . get_field('qmi_garage'); ?>
				</p>
				<a href="<?php echo get_field('qmi_link') ?>" title="view home" class="btn orange-btn" target="_blank">View home</a>
			</div>
		</article>
		<?php endwhile; else: ?>
			<article class="qmi-no-homes">
				<h4 class="orange-txt">There are currently no available homes from this builder.</h4>
			</article>
		<?php endif; ?>
	</div>
</div>


<?php endforeach; wp_reset_query(); ?>
