<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <title>
        <?php wp_title('|',1,'right'); ?>
            <?php bloginfo('name'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-15079465-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-15079465-7');

    </script>



    <!--Stylesheets-->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">

    <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?php echo site_url(); ?>">
                    <img id="toplogo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg">
                    </a>
                </li>
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'menu', 'container_class' => 'li')); ?>
            </ul>
        </div>

        <div id="page-content-wrapper">

            <div class="container-fluid">

                <!-- Hamburger Menu/toggler -->

                <a href="#menu-toggle" class="btn btn-light" id="menu-toggle"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                <!-- /Hamburger Menu/toggler -->
