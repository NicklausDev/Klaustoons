<?php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Klaustoons: Successfully Subscribed</title>
    <meta name="description" content="Klaustoons Coming Soon Sccessfully Subscribed Page">
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

    <style>

        .success--container,
        .success-btn-container{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .success--icon{
            max-width: 100%;
        }

        .success--header {
            margin-top: 0px;
            color: #006039;
        }

        .success-btn-container a{
            border: none;
        }

    </style>

</head>

<body>
    <div class="row">
        <div class="column">
            <div class="success--container">
                <div>
                    <img class="success--icon" src="./images/icons/2237-champagne-flutes-outline.apng" autoplay="true"></video>
                </div>

                <div class="column">
                    <h2 class="success--header">Successfully Subscribed</h2>
                    <p class="success-text">
                        Alriight. Now sit tight and count down with us, awaiting the Grand Launch Date.<br>
                        See you then.
                    </p>

                    <div class="success-btn-container">
                        <a href="index.php">
                            <button class="btn btn--stroke">Sure thing</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>