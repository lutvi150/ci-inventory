<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cv Setia Jaya &mdash; Profil</title>
    <!-- header -->
    <?php $this->load->view("components/depan/header"); ?>
    <!-- header -->

</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <header class="site-navbar py-1" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Setia<strong> Jaya</strong></a></h1>
                    </div>

                    <div class="col-10 col-xl-10 d-none d-xl-block">
                        <nav class="site-navigation text-right" role="navigation">

                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="active"><a href="<?= base_url("auth"); ?>">Home</a></li>

                                <li><a href="<?= base_url("auth/profil"); ?>">Profil</a></li>
                                <!-- <li><a href="<?= base_url("auth/kontak"); ?>">Kontak</a></li> -->
                                <li><a href="<?= base_url("auth/login"); ?>"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2">+</span> Login</span></a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-6 col-xl-2 text-right d-block">

                        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    </div>

                </div>
            </div>

        </header>

        <div class="unit-5 overlay" style="background-image: url(<?= base_url("asset/images/work-11.jpg") ?>);">
            <div class="container text-center">
                <h2 class="mb-0">Profil</h2>
                <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Profil</span></p>
            </div>
        </div>




        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-5" data-aos="fade">
                        <img src="<?= base_url("asset/images/work-5.jpg") ?>" class="img-md-fluid" alt="Placeholder image">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-white pl-lg-5 pl-0  pb-lg-5 pb-0">
                            <h2 class="font-weight-bold text-black" data-aos="fade">Profil</h2>
                            <p>CV. Setia Jaya Adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque perferendis, laudantium quod architecto velit ad officiis facere eveniet in fuga fugiat delectus rerum doloribus quos consectetur unde, expedita, quibusdam corporis impedit quia sequi aliquid sit. Ducimus labore molestias odio nam necessitatibus laboriosam vero saepe enim nobis. Repudiandae quidem, sint earum dolorum consequuntur dignissimos excepturi mollitia omnis aliquid, corporis, unde!</p>
                            <ul class="site-block-check">
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Dicta doloribus veniam impedit, enim!</li>
                                <li>Quod, facilis cupiditate repellat voluptas.</li>
                                <li>Quae impedit id maxime fugiat.</li>
                                <li>Esse aut iste dolor. In.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END section -->


        <!-- footer -->
        <?php $this->load->view("components/depan/footer"); ?>

        <!-- footer -->

    </div>
    <!-- script -->
    <?php $this->load->view("components/depan/script"); ?>

    <!-- script -->

</body>

</html>