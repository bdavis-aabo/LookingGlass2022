<?php get_header(); ?>

  <?php
    $_news = new WP_Query();
    $_args = array(
      'post_type'       => 'page',
      'post_status'     => 'publish',
      'posts_per_page'  => 1,
      'name'            => 'news-events'
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

    <section class="page-section news-content-section light-bg">
      <div class="homepage-content page-content" data-aos="fade-up" data-aos-duration="1250" data-aos-easing="ease-in-out">
        <?php the_content() ?>
      </div>
  <?php endwhile; endif; wp_reset_query(); ?>

  <?php if(have_posts()): ?>
      <div class="news-container">
        <?php while(have_posts()): the_post(); ?>
        <article class="news-article <?php if(is_single()): echo 'news-single'; endif; ?>" id="<?php echo 'news-article-'.$post->ID ?>">
          <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid post-image')); ?>
          <p class="article-date"><?php echo get_the_date() ?></p>
          <h2 class="article-title orange-txt"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
          <?php the_content('<p><button class="btn orange-btn">Read More</button></p>') ?>
        </article>
        <?php endwhile; ?>
      </div>

  <?php endif; ?>
  </section>


<?php get_footer(); ?>
