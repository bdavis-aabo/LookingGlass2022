<?php /* Template Name: Page - Quick Move-Ins */ ?>

<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php if(get_field('page_sub_heroimage') != ''):
		$_lgImage = get_field('page_sub_heroimage');
		$_mobImage = get_field('page_mobile_hero');
	?>
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
			<?php the_content(); ?>
		</div>

		<div class="qmihomes-container">
			<?php get_template_part('homes/qmi-builders'); ?>
		</div>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
