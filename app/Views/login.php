<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">


    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
    <link href="/assets/favicon.ico" rel="icon">

    <link href="" rel="stylesheet">

    <title>Login</title>

    <link href="/secondary.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <!-- Add your content of header -->
    <header>
        <nav class="navbar-sec navbar-sec-default active">
            <div class="container">
                <div class="navbar-sec-header">
                    <button type="button" class="navbar-sec-toggle collapsed" data-toggle="collapse" data-target="#navbar-sec-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-sec-brand" href="/" title="">
                        <img src="/assets/images/pngwing.com.png" class="navbar-sec-logo-img" alt="">
                        DINAS KEBUDAYAAN PROVINSI RIAU
                    </a>
                </div>

                <div class="collapse navbar-sec-collapse" id="navbar-sec-collapse">
                    <ul class="nav navbar-sec-nav navbar-sec-right">
                        <li><a href="/" title="">Home</a></li>
                        <li><a href="opk" title="">OPK</a></li>
                        <li><a href="news" title="">Gallery</a></li>
                        <li><a href="kegiatan" title="">Kegiatan</a></li>
                        <!-- <li>
                            <p>
                                <a href="components" class="btn btn-default navbar-sec-btn" title="">Components</a>
                            </p>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">

                <div class="card">
                    <h2 class="card-header card-header-center"><?= lang('Auth.loginTitle') ?></h2>
                    <div class="card-body">

                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <form action="<?= route_to('login') ?>" method="post">
                            <?= csrf_field() ?>

                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="form-group">
                                    <label for="login"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="password"><?= lang('Auth.password') ?></label>
                                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>

                            <br>

                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                        </form>

                        <hr>

                        <?php if ($config->allowRegistration) : ?>
                            <p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                        <?php endif; ?>
                        <?php if ($config->activeResetter) : ?>
                            <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer-container white-text-container">
        <div class="container">
            <div class="row">


                <div class="col-xs-12">
                    <h5>DINAS KEBUDAYAAN PROVINSI RIAU</h5>
                    <p>Jln. Jenderal Sudirman No. 194 <br> Tangkerang - Pekanbaru - Riau <br> Kode Pos 28128 <br> Email: <a href="mailto:disbud@riau.go.id">disbud@riau.go.id</a>
                    </p>

                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <!-- <p><small>Website created with <a href="http://www.mashup-template.com/" title="Create website with free html template">Mashup Template</a>/<a href="https://www.unsplash.com/" title="Beautiful Free Images">Unsplash</a></small>
                        </p> -->
                            <p class="text-left">
                                <a href="https://facebook.com/Dinas-Kebudayaan-Provinsi-Riau-251250921989219/" class="social-round-icon white-round-icon fa-icon" title="">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>

                                <a href="https://www.instagram.com/disbud.provriau/" class="social-round-icon white-round-icon fa-icon" title="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </p>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            navActivePage();
            scrollRevelation('.reveal');
        });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID 

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

-->
    <script type="text/javascript" src="./main.0cf8b554.js"></script>
</body>

</html>