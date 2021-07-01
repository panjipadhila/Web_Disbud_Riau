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

    <title><?= $title; ?></title>

    <link href="/secondary.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <!-- Add your content of header -->
    <header>
        <nav class="navbar navbar-default active">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" title="">
                        <img src="/assets/images/pngwing.com.png" class="navbar-logo-img" alt="">
                        DINAS KEBUDAYAAN PROVINSI RIAU
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/" title="">Home</a></li>
                        <li class ="nav-item dropdown">
                        <a class="nav-link dropdown toggle" href="#" id = "navbarDropdown" role = "button" data-Toggle="dropdown">Data</a>
                        <div class = "dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="opk" title="">OPK</a>
                        <br>
                        <a href="museum" title="">Museum</a>
                        </div>
                        </li>
                        <!-- <li><a href="/opk" title="">OPK</a></li> -->
                        <li><a href="/news" title="">Gallery</a></li>
                        <li><a href="/kegiatan" title="">Kegiatan</a></li>
                        <!-- <li>
                            <p>
                                <a href="components" class="btn btn-default navbar-btn" title="">Components</a>
                            </p>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>
    </header>