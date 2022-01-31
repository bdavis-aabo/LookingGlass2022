<?php get_header(); ?>

  <section class="page-section news-content-section light-bg">
    <?php if(have_posts()): ?>
    <div class="news-container">
      <?php while(have_posts()): the_post(); ?>
      <article class="news-article-single <?php if(is_single()): echo 'news-single'; endif; ?>" id="<?php echo 'news-article-'.$post->ID ?>">
        <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid post-image')); ?>
        <p class="article-date"><?php echo get_the_date() ?></p>
        <h2 class="article-title orange-txt"><?php the_title() ?></h2>
        <?php the_content('<p><button class="btn orange-btn">Read More</button></p>') ?>
      </article>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </section>

<?php get_footer(); ?>
