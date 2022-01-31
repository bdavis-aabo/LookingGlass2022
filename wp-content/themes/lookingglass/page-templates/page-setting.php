<?php /* Template Name: Page - Setting */ ?>

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

    <section class="page-section setting-content-section light-bg">
      <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <?php the_content() ?>
      </div>
    </section>

    <section class="page-section setting-map">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/location-map_new.jpg" alt="<?php bloginfo('name') ?> - Location Map" class="img-fluid" />
    </section>

    <?php if(have_rows('page_sliders')): $_offset = 250; ?>
    <section class="page-section page-subsection setting-subsection">
      <div class="page-sub-content neighborhoods">
        <?php while(have_rows('page_sliders')): the_row(); $_subImage = get_sub_field('slide_front_image'); ?>
        <article class="neighborhood">
          <figure class="page-sub-image" data-aos="fade-up" data-aos-duration="1250" data-aos-delay="<?php echo $_offset ?>" data-aos-easing="ease-in-out">
            <img src="<?php echo $_subImage['url'] ?>" alt="<?php echo $_subImage['alt'] ?>" class="img-fluid alignleft" />
            <span class="btn orange-btn" data-aos="fade-in" data-aos-duration="666" data-aos-easing="ease-in-out"><?php echo get_sub_field('slide_title') ?></span>
          </figure>

          <div class="neighborhood-details" data-aos="fade-up" data-aos-duration="1250" data-aos-delay="100" data-aos-easing="ease-in-out">
            <?php echo get_sub_field('slide_content') ?>
          </div>
        </article>
        <?php $_offset = $_offset + 250; endwhile; ?>
      </div>
    </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
