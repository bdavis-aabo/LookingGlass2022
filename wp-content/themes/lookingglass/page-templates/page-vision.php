<?php /* Template Name: Page - Vision Page */ ?>

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

      <section class="page-section vision-content-section light-bg">
        <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
          <?php the_content() ?>
        </div>
      </section>

      <?php if(have_rows('page_sub_contents')): while(have_rows('page_sub_contents')): the_row(); $_subImage = get_sub_field('page_sub_image'); ?>
        <section class="page-section page-subsection vision-subsection">
          <div class="page-sub-content">
            <div class="page-sub-image" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
              <img src="<?php echo $_subImage['url'] ?>" alt="<?php echo $_subImage['alt'] ?>" class="img-fluid alignleft" />
            </div>
            <div class="page-sub-text" data-aos="fade-up" data-aos-duration="1250" data-aos-delay="666" data-aos-easing="ease-in-out">
              <?php echo get_sub_field('page_sub_content') ?>
            </div>
          </div>
        </section>
      <?php endwhile; endif; ?>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
