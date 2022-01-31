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
        <div class="builder-intro"><?php echo get_field('homebuilder_introduction') ?></div>

        <?php if(get_field('homebuilder_link') != ''): ?>
        <a href="<?php echo get_field('homebuilder_link') ?>" title="<?php the_title() ?>" target="_blank" class="btn orange-btn">
          Visit <?php the_title() ?>
        </a>
        <?php endif; ?>

      </div>
    <?php endwhile; ?>
    </div>
  </div>


<?php endif; wp_reset_query(); ?>
