<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="description" content="ACS-ERC: &amp; LDN Individual Research Initiative 1988-2021"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Katex -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.css" integrity="sha384-zTROYFVGOfTw7JV7KUu8udsvW2fx4lWOsCEDqhBreBwlHI4ioVRtmIvEThzJHGET" crossorigin="anonymous">

    <!-- The loading of KaTeX is deferred to speed up page rendering -->
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.js" integrity="sha384-GxNFqL3r9uRJQhR+47eDxuPoNE7yLftQM8LcxzgS4HT73tp970WS/wV5p8UzCOmb" crossorigin="anonymous"></script>

    <!-- To automatically render math in text elements, include the auto-render extension: -->
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/contrib/auto-render.min.js" integrity="sha384-vZTG03m+2yp6N6BNi5iM4rW4oIwk5DfcNdFfxkk9ZWpDriOkXX8voJBFrAO7MpVl" crossorigin="anonymous"
        onload="renderMathInElement(document.body);"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900'>
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css2?family=Courgette&family=Roboto+Slab:wght@300&display=swap'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Calligraffitti&family=Kufam&family=Parisienne&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Syne+Tactile&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Acme&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Petemoss&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Trocchi&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">

    <!-- bootstrap -->
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" 
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
          crossorigin="anonymous"> -->
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo URL_ROOT; ?>/public/css/bootstrap.css">

    <!-- local css file -->
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo URL_ROOT; ?>/public/css/mipweb.css"
    >
    <title><?php echo SITE_NAME;?></title>
</head>
<body>
    <nav class="navbar navbar-expand-sm pb-4 mb-4 fixed-top text-white navbar-js">
        <div class="container-fluid ">
            <a href="<?php echo URL_ROOT; ?>/home/index" class="brand-logo text-white">
                <img class="img-fluid logo-banner px-2 m-1" width="128" height="28" src="<?php echo URL_ROOT; ?>/public/logos/acserc_georgia_ad05.svg" alt="Website-Logo">
            </a>
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenuTop"
                aria-controls="navmenuTop"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mip-menu" id="navmenuTop">
                <ul class="navbar-nav px-0 mb-lg-0 flex-nowrap nav-list">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URL_ROOT; ?>/home/index"><i class="fa fa-home px-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_ROOT; ?>/home/mipteam"><i class="fa fa-users px-1"></i>Our Team</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link flex-wrap" href="#cs-ip"><i class="fa fa-laptop px-1"></i>Computer Science Impossible Jump</a>
                    </li> -->
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-university px-1"></i>Computer Science Impossible Jump - The Africa We Want</a>
                        <ul class="sub-menu mt-2">
                            <li><a href="<?php echo URL_ROOT; ?>/publication/index"><i class="fa fa-th-list px-1" aria-hidden="true"></i>The Africa We Want - Part I</a></li>
                            <li><a href="<?php echo URL_ROOT; ?>/publication/displayaww2"><i class="fa fa-th-list px-1" aria-hidden="true"></i>The Africa We Want - Part II</a></li>
                            <!-- <li><a href="#"><i class="fa fa-graduation-cap px-1" aria-hidden="true"></i>Our Scientific Papers</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-handshake-o px-1"></i>Partner With Us</a>
                        <ul class="sub-menu mt-2">
                            <li><a href="#"><i class="fa fa-gg-circle px-1" aria-hidden="true"></i>Collaborate with us</a></li>
                            <!-- <li><a href="#"><i class="fa fa-credit-card px-1" aria-hidden="true"></i>Donate to our Research</a></li> -->
                            <li><a href="#"><i class="fa fa-wrench px-1" aria-hidden="true"></i>Hire our Services</a></li>
                            <li><a href="#"><i class="fa fa-table px-1" aria-hidden="true"></i>Request for a Demo</a></li>
                            <!-- <li><a href="#"><i class="fa fa-compass px-1" aria-hidden="true"></i>Make a Follow Up</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-folder px-1"></i>IEC Standards</a>
                        <ul class="sub-menu mt-2">
                            <li><a href="#"><i class="fa fa-folder-open px-1" aria-hidden="true"></i>IEC Standards Conformity</a></li>
                            <li><a href="#"><i class="fa fa-folder-open-o px-1" aria-hidden="true"></i>ACFTA IEC Standards Ecosystem</a></li>
                            <li><a href="#"><i class="fa fa-th px-1" aria-hidden="true"></i>SmartGrid Systems</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-heartbeat px-1"></i>LifeLinesNets & Disaster Protection</a>
                        <ul class="sub-menu mt-2">
                            <li><a href="#"><i class="fa fa-medkit px-1" aria-hidden="true"></i>ILLIE - Disaster Protection</a></li>
                            <li><a href="#"><i class="fa fa-align-center px-1" aria-hidden="true"></i>LifeLinesNets Emergency States</a></li>
                            <li><a href="#"><i class="fa fa-table px-1" aria-hidden="true"></i>LifeLinesNets Topological Reliability</a></li>
                            <li><a href="#"><i class="fa fa-snowflake-o px-1" aria-hidden="true"></i>LifeLinesNets Critical Infrastructure</a>
                                <ul class="sub-menu2 mt-2">
                                    <li><a href="#"><i class="fa fa-cube px-1" aria-hidden="true"></i>Critical Power Systems</a></li>
                                    <li><a href="#"><i class="fa fa-cubes px-1" aria-hidden="true"></i>Critical Financial Systems</a></li>
                                    <li><a href="#"><i class="fa fa-database px-1" aria-hidden="true"></i>Critical National Databases</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>