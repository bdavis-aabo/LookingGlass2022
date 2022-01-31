  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php //seo plugin grabs page title ?>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/assets/images/favicon.png" type="image/x-icon" />

  <?php /* Load CSS in functions.php */ ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<?php include_once('assets/_inc/ga.php') ?>

  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
  <header class="header white-bg">
    <div class="header-container">
      <button class="nav-btn" type="button" data-toggle="collapse" data-target="#main-menu-navbar">
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
      </button>

      <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
        <a href="<?php bloginfo('url') ?>" class="navbar-brand">
          <img src="<?php bloginfo('template_directory') ?>/assets/images/lg_logo-brown.svg" alt="<?php bloginfo('name') ?>" class="img-fluid header-logo" />
        </a>
        <?php
        wp_nav_menu(array(
          'menu'            =>  'main-menu',
          'depth'           =>  2,
          'container'       =>  'div',
          'container_class' =>  'collapse navbar-collapse navbar-expand-lg',
          'container_id'    =>  'main-menu-navbar',
          'menu_class'      =>  'navbar-nav ml-auto',
          'fallback_cb'     =>  'WP_Bootstrap_Navwalker::fallback',
          'walker'          =>  new WP_Bootstrap_Navwalker()
        ));
        ?>
      </nav>
    </div>
  </header>
