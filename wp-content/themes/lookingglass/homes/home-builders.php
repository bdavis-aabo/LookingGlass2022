<?php
$_builders = new WP_Query();
$_args = array(
  'post_type'       => 'home-builders',
  'post_status'     => 'publish',
  'posts_per_page'  => -1,
  'order'           => 'asc',
  'orderby'         => 'menu_order'
);
$_builders->query($_args);
?>

<?php if($_builders->have_posts()): ?>
  <div class="builders-section">
    <div class="builder-container">
    <?php while($_builders->have_posts()): $_builders->the_post(); ?>
      <div class="builder" id="<?php echo $post->post_name ?>" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <figure><?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?></figure>
        <div class="builder-intro">
        	<h2 class="builder-name"><?php the_title() ?></h2>
					<?php if(get_field('homebuilder_pricing') != ''): ?>
						<strong class="orange-txt">New homes <?php echo get_field('homebuilder_pricing'); ?></strong>
					<?php else: ?>
						<strong class="orange-txt">Pricing coming soon</strong>
					<?php endif; ?>
					<?php echo get_field('homebuilder_short_intro') ?>
        </div>

        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn orange-btn">Learn More</a>

      </div>
    <?php endwhile; ?>
    </div>
  </div>


<?php endif; wp_reset_query(); ?>
