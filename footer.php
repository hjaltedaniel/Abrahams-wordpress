</div>
<?php 
//Med Wordpress funktionen "wp_enqueue_script" hentes de forskellige scripts.
wp_enqueue_script( 'smoothproducts', get_template_directory_uri() . '/assets/js/smoothproducts.min.js', array ( 'jquery' ), 1.0, true);
wp_enqueue_script( 'loadWindow', get_template_directory_uri() . '/assets/js/loadWindow.js', array ( 'jquery' ), 1.0, true);
wp_enqueue_script( 'menuToggle', get_template_directory_uri() . '/assets/js/menuToggle.js', array ( 'jquery' ), 1.0, true);
wp_enqueue_script( 'animejs', get_template_directory_uri() . '/assets/js/anime-master/anime.js', array ( 'jquery' ), 1.0, true);
wp_enqueue_script( 'animation', get_template_directory_uri() . '/assets/js/animation.js', array ( 'jquery' ), 1.0, true);
?>
    <footer class="footer text-center mt-5 navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="mb-3">Kontakt Abrahams Sammenbragte Børn</h4>
                    <p class="lead mb-0">Vindegade 72 - 74
                        <br>5000 Odense C
                        <br>+45 66 11 68 46
                        <br>Cvr: 54213687</p>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="mb-5">Sociale Medier</h4>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="btn btn-outline-dark btn-social rounded-circle" href="#">
                                <i class="fa fa-fw fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-dark btn-social rounded-circle" href="#">
                                <i class="fa fa-fw fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-dark btn-social rounded-circle" href="#">
                                <i class="fa fa-fw fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-dark btn-social rounded-circle" href="#">
                                <i class="fa fa-fw fa-youtube"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="mb-3">Om Os</h4>
                    <p class="lead mb-0">Bag kulturfestivalen Abrahams Sammenbragte Børn står bl.a. Kulturmaskinen, Odense Bibliotekerne og en lang række skoler, aftenskoler, kirker m.fl. </p>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
        </body>

        </html>
