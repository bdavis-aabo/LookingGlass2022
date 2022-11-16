<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php if(have_rows('homebuilder_heroimage')): ?>
  <section class="page-heroimage">
    <div class="image-wrap">
			<?php while(have_rows('homebuilder_heroimage')): the_row();
				$_lgImage = get_sub_field('large_image');
				$_mobImage = get_sub_field('mobile_image');
			?>
      <picture>
        <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
        <img src="<?php echo $_lgImage['url'] ?>" alt="<?php the_title() ?>" class="img-fluid aligncenter" />
      </picture>
			<?php endwhile; ?>
    </div>
  </section>
	<?php endif; ?>

  <section class="page-section builder-content-section light-bg">
    <div class="homepage-content page-content">
      <h2 class="builder-name"><?php the_title() ?></h2>
			<figure class="aligncenter wagon-wheel">
				<img src="/wp-content/uploads/2020/10/wagon-wheel.png" class="img-fluid aligncenter" alt="wagon wheel graphic" />
			</figure>
			<div class="builder-introduction">
      	<?php echo get_field('homebuilder_introduction'); ?>

				<h4 class="office-info"><?php the_title() ?> Sales Office Information</h4>
				<p class="builder-office">
					<?php echo get_field('homebuilder_address') ?><br/>
					<a href="tel:<?php echo get_field('homebuilder_phone'); ?>" class="phone"><?php echo get_field('homebuilder_phone'); ?></a>
					<br/>
					<?php echo get_field('homebuilder_hours') ?>
				</p>
				<a href="<?php echo get_field('homebuilder_link') ?>" title="Visit <?php the_title() ?>" class="btn orange-btn" target="_blank">Visit <?php the_title() ?></a>
			</div>
    </div>

		<?php get_template_part('homes/homebuilder-collection'); ?>
	</section>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
