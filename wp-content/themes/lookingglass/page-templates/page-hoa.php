<?php /* Template Name: Page - HOA */ ?>

<?php get_header(); ?>

	<section class="page-section hoa-content-section light-bg">
		<div class="content-container">
			<div class="hoa-content-left">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>

				<?php if(have_rows('hoa_tabs')): ?>
				<div class="hoa-tab-container">
					<ul class="nav nav-tabs" id="hoaTabs" role="tablist">
						<?php $_t = 0; while(have_rows('hoa_tabs')): the_row(); ?>
						<li class="nav-item" role="presentation">
							<a class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" id="tab<?php echo $_t ?>" href="#tabpane<?php echo $_t ?>" data-toggle="tab" role="tab">
								<?php echo get_sub_field('tab_title') ?>
							</a>
						</li>
						<?php $_t++; endwhile; ?>
					</ul>
					<div class="tab-content" id="hoaTabContent">
						<?php $_p = 0; while(have_rows('hoa_tabs')): the_row(); ?>
						<div id="tabpane<?php echo $_p ?>" class="tab-pane fade <?php if($_p == 0): echo 'show active'; endif; ?>" role="tabpanel">
							<?php echo get_sub_field('tab_contents') ?>
						</div>
						<?php $_p++; endwhile; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>

			<aside class="hoa-content-right">
				<?php if(get_field('hoa_board') != ''): ?>
				<div class="hoa-board">
					<h3 class="sidebar-title">HOA Board</h3>
					<?php echo get_field('hoa_board') ?>
				</div>
				<?php endif; ?>

				<?php if(get_field('hoa_contact_info')): ?>
				<div class="hoa-contact">
					<h3 class="sidebar-title">HOA Contact Info</h3>
					<?php echo get_field('hoa_contact_info') ?>
				</div>
				<?php endif; ?>
			</aside>
		</div>
	</section>

<?php get_footer(); ?>
