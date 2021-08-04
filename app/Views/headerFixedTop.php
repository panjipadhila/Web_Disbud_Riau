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


    <link rel="icon" href="/assets/logo.png">
    <link href="/assets/favicon.ico" rel="icon">


    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <link href="/secondary.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <script src="/DropdownMenu.js"></script>

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
                        <img src="/assets/images/riaulogo.png" class="navbar-sec-logo-img" alt="">
                    </a>

                </div>

                <div class="collapse navbar-sec-collapse" id="navbar-sec-collapse">
                    <ul class="nav navbar-sec-nav navbar-sec-right">
                        <li><a href="/" title="">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown toggle" href="#" id="navbar-secDropdown" role="button" data-Toggle="dropdown">Data</a>
                            <div class="dropdown-menu" aria-labelledby="navbar-secDropdown">
                                <ul class="list-unstyled">
                                    <li><a href="/opk" title="">OPK</a></li>
                                    <li><a href="/museum" title="">Museum</a></li>
                                    <li><a href="/dokumen" title="">Dokumen</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li><a href="/opk" title="">OPK</a></li> -->
                        <li><a href="/news" title="">Gallery</a></li>
                        <li><a href="/kegiatan" title="">Kegiatan</a></li>
                        <?php if (logged_in()) : ?>
                            <li><a href="/adminpage" title="">Admin</a></li>
                        <?php endif; ?>
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