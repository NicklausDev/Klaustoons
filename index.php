<?php
    session_start();
    include_once "connect.php";

    $sql = mysqli_query($conn, "SELECT * FROM subscribers");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        
        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['verification_status'] = $row['verification_status'];
            $_SESSION['email_otp'] = $row['email_otp'];
            $_SESSION['phone_otp'] = $row['phone_otp'];

            $id =$_SESSION['id'];
            
            $verifysql1 = mysqli_query($conn,"SELECT * FROM subscribers
            WHERE id = '$id' AND verification_status LIKE 'halfverified%'");
            if (mysqli_num_rows($verifysql1)>0) {
                header("Location: verify.php");
            } else {
                $verifysql2 = mysqli_query($conn,"SELECT * FROM subscribers
                WHERE id = '$id' AND verification_status LIKE '0%'");
                if (mysqli_num_rows($verifysql2)>0) {
                    header("Location: verify.php");  
                }
            }           

        }
    }

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Klaustoons: COMING SOON</title>
    <meta name="description" content="Klaustoons Coming Soon Page">
    <meta name="author" content="KLAUSTOONS.LTD">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top" class="ss-preload theme-static">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- intro
    ================================================== -->
    <section id="intro" class="s-intro">

        <div class="s-intro__bg"></div>

        <header class="s-intro__header"> 
            <div class="s-intro__logo">
                <a class="logo" href="index.php">
                    <img src="images/Klaustoons-Logo.png" alt="Homepage">
                </a>
            </div>
        </header>  <!-- s-intro__header -->

        <div class="row s-intro__content">
            <div class="column">

                <div class="text-huge-title">
                    KLAUSTOONS
                </div>

                <h1 class="text-pretitle">
                    Something exciting is coming...
                </h1>

                <div class="s-intro__content-bottom">

                    <div class="s-intro__content-bottom-block">
                        <h5>Launching in</h5>
            
                        <div class="counter">
                            <div class="counter__time">
                                <span class="ss-days">00</span>
                                <span>D</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-hours">00</span>
                                <span>H</span>
                            </div>
                            <div class="counter__time minutes">
                                <span class="ss-minutes">00</span>
                                <span>M</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-seconds">00</span>
                                <span>S</span>
                            </div>
                        </div>  <!-- end counter -->

                    </div> <!-- end s-intro-content__bottom-block -->

                    <div class="s-intro__content-bottom-block">

                    </div> <!-- end s-intro-content__bottom-block -->

                </div> <!-- end s-intro-content__bottom -->

            </div>
        </div> <!-- s-intro__content -->

        <!--<div class="s-intro__notify">
            <button type="button" class="btn--stroke btn--small">
                Notify Me
            </button>
        </div> s-intro__notify -->

        <div hidden class="s-intro__modal ss-modal">
            <div class="ss-modal__inner">

                <span class="ss-modal__close"></span>

                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="30" height="30"><path d="M.5 4.5l7 4 7-4m-13-3h12a1 1 0 011 1v10a1 1 0 01-1 1h-12a1 1 0 01-1-1v-10a1 1 0 011-1z" stroke="var(--color-2-dark)"></path></svg>
                
                <h4>Sign Up</h4>

                <p class="ss-modal__text">
                Be among the pioneers and help us oversee the generation of a universe.
                </p>

                <form autocomplete="off" id="mc-form" class="mc-form" method="post" action="" enctype="application/x-www-form-urlencoded">
                    <input type="text" name="NAME" id="mce-NAME" class="u-fullwidth text-center" placeholder="Your Name" title="Lol! Invalid Name" pattern="[A-Za-z ]{1,32}" required>
                    <input type="email" name="EMAIL" id="mce-EMAIL" class="u-fullwidth text-center" placeholder="Email Address" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
                    <input type="tel" name="NUMBER" id="mce-NUMBER" class="u-fullwidth text-center" placeholder="Phone Number" title="Invalid Phone number." pattern="^((\+|00)?[1-9]{2}|0)[1-9]([0-9]){8}$" required>
                    <input type="submit" name="subscribe" value="Subscribe" class="btn--small btn--primary u-fullwidth">
                    <!-- <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cdb7b577e41181934ed6a6a44_9a91cfe7b3" tabindex="-1" value=""></div> -->
                    <div class="mc-status"></div>
                </form>

            </div> <!-- end ss-modal__inner -->
        </div> <!-- end ss-modal -->

        <div class="s-intro__scroll">
            <a href="#hidden" class="smoothscroll">
                Scroll For More
            </a>
        </div> <!-- s-intro__scroll -->

    </section> <!-- end s-intro -->


    <!-- hidden element
    ================================================== -->
    <div id="hidden" aria-hidden="true" style="opacity: 0;"></div>


    <!-- details
    ================================================== -->
    <section id="details" class="s-details">

        <div class="row">
            <div class="column">

                <h1 class="text-huge-title text-center">
                    Hi, We Are Klaustoons.
                </h1>

                <nav class="tab-nav">
                    <ul class="tab-nav__list"> 
                        <li class="active" data-id="tab-about">
                            <a href="#0">
                                <span>About</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-services">
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav> <!-- end tab-nav -->

                <div class="tab-content">

                    <!-- 01 - tab about -->
                    <div id="tab-about" class='tab-content__item'>

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>IT'S COMING!</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">

                                <div class="row">
                                    <div class="column lg-6 tab-12">
                                        <p>
                                            <img src="images/Ascend.png" alt="Ascend Cover">
                                        </p>
                                    </div>
                                    <div class="column lg-6 tab-12 center">
                                        <p>
                                            Everything is about to change. The excitement is ramping up...<br>
                                            <b>Our website is on the way</b><br>
                                            Well, we're still "drawing" the website,But once we're done...IT'S SHOWTIME!<br>
                                            <b>Oh, who are we?</b><br>
                                            We're a comic-sharing company that's a brand of collective creativity, creating the next
                                            generation of innovators and changemakers in the art industry while curating a diverse
                                            catalogue of stories to entertain everyone in the world. We strive to allow every artist 
                                            to dare to dream and turn their worlds of fantasy into reality.<br>
                                            <b>Now that's something you definitely wanna stick around for.<br>
                                                Sign up to get notified when we launch and join us in bringing every idea imaginable 
                                                to life...
                                            </b>
                                        </p>

                                        <?php 
                                            if (isset($id)) {
                                                     
                                                $verifysqlbtn = mysqli_query($conn,"SELECT * FROM subscribers
                                                WHERE id = '$id'");
                                                
                                                if (mysqli_num_rows($verifysqlbtn)>0) { 
                                                    $row = mysqli_fetch_assoc($sql);
                                                    if ($row) {
                                                        $_SESSION['id'] = $row['id'];
                                                        $id = $_SESSION['id'];
                                                    }

                                            }
                                        ?>

                                            <div class="btn-notification">
                                                <button type="button" class="btn--stroke u-fullwidth disabled" disabled>
                                                    Already Subscribed
                                                </button>
                                            </div>
                                            
                                        <?php   
                                        
                                            } else {

                                        ?>
                                            
                                            <div class="btn-notification">
                                                <button type="button" class="btn--stroke u-fullwidth ss-modal-trigger">
                                                Get Notified   
                                                </button>
                                             </div>

                                        <?php
                                            } 
                                        
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- end 01 - tab about -->

                    <!-- 03 - tab contact -->
                    <div id="tab-contact" class="tab-content__item">

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>Get in Touch.</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                
                                <p class="lead">
                                Come say hi, we're eager to meet you...
                                </p>

                                <div class="row">
                
                                    <div class="column lg-6 tab-12">
                                        <h4>Where to Find & Follow Us</h4>
                
                                        <ul class="link-list">
                                            <li><a href="https://instagram.com/klaustoons"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                                        </ul>
                
                                    </div>
                                </div>

                                <p class="tab-content__item-bottom">
                                    <a href="mailto:info@klaustoons.co.ke" class="contact-email">info@klaustoons.co.ke</a>
                                    <span class="contact-number"> 
                                        <a href="tel:254743652519">+254 743 652 519</a>
                                    </span>
                                </p>

                            </div>
                        </div>
                        
                    </div> <!-- end 03 - tab contact -->

                </div> <!-- end tab content -->

                <!-- footer  -->
                <footer>
                    <div class="ss-copyright">
                        <span>© Copyright Klaustoons 2023</span> 
                    </div>
                </footer>

            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <span>Back to Top</span>
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
             </a>
        </div> <!-- end ss-go-top -->

    </section> <!-- end s-details -->


    <!-- Java Script
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/31062394fe.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>