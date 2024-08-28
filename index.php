<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - A community of developers, by developers: explore technologies from code to production.">
    <meta name="author" content="Clément Defer">
    <title>DevNavigator - A community of developers, by developers: explore technologies from code to production.</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/dev-navigator-style.css" rel="stylesheet">
</head>

<body>

    <main>

        <?php require_once(__DIR__ . '/header.php'); ?>

        <section class="hero-section" id="section_1">
            <div class="section-overlay"></div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 mt-auto mb-5 text-center">
                        <small>ALL ABOUT</small>
                        <h1 class="text-white mb-5 fs-3">PROGRAMMING LANGUAGES</h1>
                        <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a>
                    </div>
                    <div class="social-share">
                        <ul class="social-icon d-flex align-items-center justify-content-center">
                            <span class="text-white me-3">About Author:</span>
                            <li class="social-icon-item">
                                <a href="https://clementdefer.netlify.app/" class="social-icon-link" target="_blank" rel="noopener noreferrer">
                                    <span class="bi-person"></span>
                                </a>
                            </li>
                            <li class="social-icon-item">
                                <a href="https://github.com/CLMNTDFR" class="social-icon-link" target="_blank" rel="noopener noreferrer">
                                    <span class="bi-github"></span>
                                </a>
                            </li>
                            <li class="social-icon-item">
                                <a href="https://www.linkedin.com/in/clmntdfr/" class="social-icon-link" target="_blank" rel="noopener noreferrer">
                                    <span class="bi-linkedin"></span>
                                </a>
                            </li>
                            <li class="social-icon-item">
                                <a href="https://x.com/clmntdfr" class="social-icon-link" target="_blank" rel="noopener noreferrer">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="video/pexels-2022395.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section>

        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">Welcome to DevNavigator!</h2>
                            <h6 class="text-white mt-4">The platform dedicated to all passionate developers:</h6>
                            <br>
                            <p class="text-white">Whether you're a curious beginner or a seasoned expert, DevNavigator is 
                                designed to let you share and explore knowledge about programming languages, frameworks, DevOps 
                                practices and more. Here, each user can create articles to contribute to the community, exchange ideas, 
                                and enrich a continuous learning space.</p>
                            <p class="text-white">Read articles written by developers, comment on them to engage in 
                                constructive discussions, and like them to encourage content creators. Every interaction helps build a community 
                                where knowledge flows freely and every contribution counts.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <br>
                            <img src="images/colored_code_3.jpg" class="about-image img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="text-white mb-0 fs-3 text-center">
                        <h5 class="text-white mb-5 fs-5 text-center">A remark about <i class="bi bi-compass"></i> DevNavigator?</h5>
                    </div>
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-white mb-5 fs-0 text-center">Contact Form</h2>
                        <div class="shadow-lg mt-5">
                            <form class="custom-form contact-form mb-5 mb-lg-0" action="submit_contact.php" method="POST" role="form">
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="contact-name" id="contact-name" class="form-control" placeholder="Full name" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="contact-email" id="contact-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                        </div>
                                    </div>
                                    <input type="text" name="contact-company" id="contact-company" class="form-control" placeholder="Company">
                                    <textarea name="contact-message" rows="3" class="form-control" id="contact-message" placeholder="Message"></textarea>
                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit" class="form-control">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
