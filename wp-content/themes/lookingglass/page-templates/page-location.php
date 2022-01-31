<?php /* Template Name: Page - Location */ ?>

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

  <section class="page-section location-content-section light-bg">
    <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
      <?php the_content() ?>
    </div>
  </section>

  <section class="page-section location-map-container">
    <div class="map-container" id="map"></div>
    <nav class="map-menu" id="menu"></div>
  </section>

  <section class="page-section location-information orange-bg">
    <div class="stats-container">
      <div class="stat" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <div class="counting outline" data-count="5">0</div>
        <h4>miles to Parker</h4>
      </div>
      <div class="stat" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <div class="counting outline" data-count="8">0</div>
        <h4>miles to Castle Rock</h4>
      </div>
      <div class="stat" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <div class="counting outline" data-count="15">0</div>
        <h4>miles to Denver Tech Center</h4>
      </div>
      <div class="stat" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <div class="counting outline" data-count="26">0</div>
        <h4>miles to Downtown Denver</h4>
      </div>
      <div class="stat" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <div class="counting outline" data-count="34">0</div>
        <h4>miles to Denver International Airport</h4>
      </div>

    </div>
  </section>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
