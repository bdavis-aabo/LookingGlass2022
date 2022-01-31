<?php /* Template Name: Page - News */ ?>

<?php get_header(); ?>

  <?php
    $_news = new WP_Query();
    $_args = array(
      'post_type'       => 'page',
      'post_status'     => 'publish',
      'posts_per_page'  => -1,
      'order'           => 'asc/desc',
      'orderby'         => 'title'
    );
    $_news->query($_args);

    if($_news->have_posts()): while($_news->have_posts()): $_news->the_post();
    $_mobHero = get_field('page_mobile_hero');
?>
<section class="page-heroimage">
  <div class="image-wrap">
    <picture>
      <source media="(max-width: 375px)" srcset="<?php echo $_mobHero['url'] ?>">
      <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid heroimage')); ?>
    </picture>
  </div>
</section>
<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>
