<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>

  <?php if(have_posts()): while(have_posts()): the_post();
    $_mobHero = get_field('homepage_mobile_hero');
  ?>
  <section class="page-heroimage">
    <div class="image-wrap">
      <picture>
        <source media="(max-width: 375px)" srcset="<?php echo $_mobHero['url'] ?>">
        <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid heroimage')); ?>
      </picture>
    </div>
  </section>

  <section class="page-section homepage-content-section light-bg">
    <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <?php the_content() ?>
    </div>
  </section>

  <?php if(get_field('homepage_sub_image') != ''): $_homeSubImage = get_field('homepage_sub_image'); ?>
  <section class="page-section homepage-subsection">
    <div class="orange-bg"></div>
    <div class="homepage-sub-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <figure><img src="<?php echo $_homeSubImage['url'] ?>" alt="<?php echo $_homeSubImage['alt'] ?>" class="img-fluid aligncenter" /></figure>
    </div>
  </section>
  <?php endif; ?>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
