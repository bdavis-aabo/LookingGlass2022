<?php /* Template Name: Page - The Homes */ ?>

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

  <section class="page-section homes-content-section light-bg">
    <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <?php the_content() ?>
    </div>

    <div class="page-subcontent-container">
    <div class="homepage-content page-subcontent" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <?php
      while(have_rows('page_sub_contents')): the_row();
        echo get_sub_field('page_sub_content');
      endwhile;
      ?>
    </div>
    </div>
    <?php get_template_part('homes/home-builders') ?>
  </section>



  <?php if(get_field('page_sub_heroimage') != ''): $_subImage = get_field('page_sub_heroimage') ?>
  <section class="page-section homes-subhero">
    <figure class="page-subhero">
      <img src="<?php echo $_subImage['url'] ?>" alt="<?php echo $_subImage['alt'] ?>" class="img-fluid" />
    </figure>
  </section>
  <?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
