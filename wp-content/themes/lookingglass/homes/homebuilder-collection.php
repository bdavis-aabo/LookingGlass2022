<?php while(have_rows('homebuilder_collection')): the_row(); ?>

	<div class="builder-collection-container">
		<div class="collection-container">
			<h2 class="collection-name"><?php echo get_sub_field('collection_name') ?></h2>
			<?php echo get_sub_field('collection_description') ?>
		</div>
	</div>


<?php if(have_rows('collection_floorplans')): ?>

	<div class="builder-floorplan-container">
		<?php while(have_rows('collection_floorplans')): the_row(); $_image = get_sub_field('floorplan_image'); ?>
		<article class="floorplan">
			<figure class="floorplan-image">
				<img src="<?php echo $_image['url'] ?>" alt="<?php echo get_sub_field('floorplan_name') ?>" class="img-fluid aligncenter" />
			</figure>
			<h3 class="floorplan-name orange-txt">
				<?php echo get_sub_field('floorplan_name'); if(get_sub_field('floorplan_price') != ''): echo '<em> | starting from ' . get_sub_field('floorplan_price') . '</em>'; endif; ?>
			</h3>
			<?php echo get_sub_field('floorplan_details'); ?>
		</article>
		<?php endwhile; ?>
	</div>

<?php endif;  // end floorplans ?>

<?php endwhile; // end collections ?>
