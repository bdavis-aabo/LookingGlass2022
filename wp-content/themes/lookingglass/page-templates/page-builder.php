<?php /* Template Name: Page - Builder Detail */ ?>

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

  <section class="page-section builder-content-section light-bg">
    <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <h1 class="builder-name"><?php the_title() ?></h1>
      <?php the_content() ?>
    </div>

    <?php if(have_rows('builder_models')): ?>
    <div class="builder-model-container">
      <div class="model-container">
        <?php while(have_rows('builder_models')): the_row(); $_modelImage = get_sub_field('model_image'); ?>
          <article class="model">
            <img src="<?php echo $_modelImage['url'] ?>" alt="<?php echo $_modelImage['alt'] ?>" class="aligncenter img-fluid" />
            <p class="model-name"><strong><?php echo get_sub_field('model_name') ?></strong> | <?php echo get_sub_field('model_price') ?></p>
            <p class="model-details"><?php echo get_sub_field('model_details') ?></p>
            <a href="<?php echo get_sub_field('model_link') ?>" title="<?php echo get_sub_field('model_name') ?>" class="btn orange-btn" />More information</a>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
