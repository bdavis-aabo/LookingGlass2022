<?php /* Template Name: Page - Lifestyle */ ?>

<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post();
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

  <section class="page-section lifestyle-content-section light-bg">
    <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <?php the_content() ?>
    </div>

    <?php if(get_field('page_sub_heroimage') != ''): $_subImage = get_field('page_sub_heroimage'); ?>
    <div class="lifestyle-subsection">
      <div class="orange-bg"></div>
      <div class="homepage-sub-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <figure><img src="<?php echo $_subImage['url'] ?>" alt="<?php echo $_subImage['alt'] ?>" class="img-fluid aligncenter shadow" /></figure>
      </div>
    </div>
    <?php endif; ?>
  </section>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
