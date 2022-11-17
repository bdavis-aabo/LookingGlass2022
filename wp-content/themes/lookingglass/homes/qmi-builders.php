<!--
get builders
foreach builders -> builder
get qmi homes by builder
-->

<?php
	$_termArgs = array(
		'orderby'	=>	'name',
		'order'		=>	'ASC',
		'hide_empty'	=> 0
	);
	$_builders = get_terms('builder', $_termArgs);
?>

<?php foreach($_builders as $_builder): ?>
<section class="page-section qmi-builder-section tan-bg">
	<div class="builder-section-content">
		<h2 class="builder-title"><?php echo $_builder->name ?></h2>
		<div class="builder-details">
			<?php echo $_builder->description ?>
		</div>
	</div>
</section>

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

<?php if($_qmiHomes->have_posts()): ?>
<section class="page-section qmihomes-section">
	<div class="qmihomes-container">
		<?php while($_qmiHomes->have_posts()): $_qmiHomes->the_post(); $_homeImage = get_field('qmi_image'); ?>
		<article class="qmi-home">
			<figure class="home-image">
				<img src="<?php echo $_homeImage['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
			</figure>
			<div class="home-details">
				<h4 class="home-title"><?php echo get_field('qmi_plan_name') . ' | ' . get_field('qmi_address'); ?></h4>
				<p class="home-price ltgreen-txt"><?php echo '$' . get_field('qmi_price'); ?></p>
				<p class="home-information">
					<?php echo get_field('qmi_square_footage') . ' sq ft | ' . get_field('qmi_bedrooms') . ' beds | ' . get_field('qmi_bathrooms') . ' baths | ' . get_field('qmi_garage'); ?>
				</p>
				<a href="<?php echo get_field('qmi_link') ?>" title="view home" class="link link--arrowed" target="_blank">
          View home <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
        </a>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>

<?php endforeach; wp_reset_query(); ?>
