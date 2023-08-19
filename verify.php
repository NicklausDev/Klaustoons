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

                $verify = $_SESSION['verification_status'];
                $id =$_SESSION['id'];
                $notverified = "0";
                $halfverified = "halfverified";
                $verified = "verified";

                $verifysql1 = mysqli_query($conn,"SELECT * FROM subscribers
                WHERE id = '$id' AND verification_status LIKE 'verified%'");
                if (mysqli_num_rows($verifysql1)>0) {
                    header("Location: success.php");
                } else {

                    $verifysql2 = mysqli_query($conn,"SELECT * FROM subscribers
                    WHERE id = '$id' AND verification_status LIKE 'halfverified%'");
                    if (mysqli_num_rows($verifysql2)>0) {
                        header("Location: verifyphone.php");
                    } else {

                        $verifysql3 = mysqli_query($conn,"SELECT * FROM subscribers
                        WHERE id = '$id' AND verification_status LIKE '0%'");
                        if (mysqli_num_rows($verifysql3)>0) {
                            
                        } else {                            
                            header("Location: index.php");
                        }
                    }
                }

            } else {
                
                $error = "Failed to Verify Data, Try Again"; 
            }
        } else {
            header("Location: index.php");
        }

    $error ="";
    $id = $_SESSION['id'];
    $session_emotp = $_SESSION['email_otp'];
    $session_nootp = $_SESSION['phone_otp'];

    if(count($_POST) > 0){

                $emotp1 = $_POST['otp1'];
                $emotp2 = $_POST['otp2'];
                $emotp3 = $_POST['otp3'];
                $emotp4 = $_POST['otp4'];

                $emotp = $emotp1.$emotp2.$emotp3.$emotp4;

                if (!empty($emotp)) {
                    if ($emotp == $session_emotp) {
                       $sql = mysqli_query($conn, "SELECT * FROM subscribers WHERE id = '{$id}' AND email_otp = '{$emotp}'");
                       if (mysqli_num_rows($sql) > 0) {
                            $null_otp = 0;
                            $sql2 = mysqli_query($conn, "UPDATE subscribers SET `verification_status` = 'halfverified', `email_otp` = '$null_otp' WHERE id = '{$id}' AND email_otp = '{$emotp}' LIMIT 1 ");
                            if ($sql2) {
                                $row = mysqli_fetch_assoc($sql);
                                if ($row) {
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['verification_status'] = $row['verification_status'];

                                    exit ('Success');
                                } else {
                                    
                                    exit ('Failed to Verify Data, Try Again'); 
                                }

                            } else {

                                exit ('Something went wrong,Try Again');

                            } 

                        } else {

                            exit ('Sorry, Your Data Appears to be missing, Try Registering Afresh');

                        }   

                    } else {
                        exit ("The OTP You Entered Doesn't Match The One Sent!");
                    }   

                }   else {

                    exit ('All input fields are required!');

                }
                
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Klaustoons: Verify Accounts</title>
    <meta name="description" content="Klaustoons Coming Soon Verify Page">
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

        .verify-row{
            padding-top: 80px;
        }

        .verify-container{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .fields--input{
            margin-bottom: 20px;
            display: flex;
            flex-wrap: nowrap;
            flex: 1;
            align-items: center;
            justify-content: center;
        }

        input[type="number"].otp__field {
            width: 70px;
            height: 70px;
            -webkit-appearance: auto;
            -moz-appearance: textfield;
        }

        input[type="number"].otp__field:focus{
            border-bottom: 2px solid #006039;
            -webkit-appearance: auto;
            -moz-appearance: textfield;
        }

        input[type="number"].otp__field::-webkit-inner-spin-button,
        input[type="number"].otp__field::-webkit-outer-spin-button{
            display: none;
        }

        input[type="submit"].btn--verify.inactive{
            opacity: 0.4;
            pointer-events: none;
        }

        input[type="submit"].btn--verify{
            opacity: 1;
            pointer-events: auto;
        }

        #error--text{
            color: red;
            margin: auto;
        }
    </style>
</head>
<body>
                    <div class="row verify-row">
                        <div class="column">
                            <nav class="tab-nav">
                                <ul class="tab-nav__list"> 
                                    <li class="active" data-id="tab-about">
                                        <a href="#0">
                                            <span>Verify Your Email Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="verify-container">
                                
                                <p>
                                    We sent the four digits otp code to your email.
                                    Enter the code below to confirm your email address...
                                </p>

                                <div id="error--text"></div>

                                <form method="post" autocomplete="off" id="otpform">

                                    <div class="fields--input">
                                        <input type="number" id="otp1" name="emotp1" class="otp__field" placeholder="0" min="0" max="9" onpaste="return false">
                                        <input type="number" id="otp2" name="emotp2" class="otp__field" placeholder="0" min="0" max="9" onpaste="return false" disabled>
                                        <input type="number" id="otp3" name="emotp3" class="otp__field" placeholder="0" min="0" max="9" onpaste="return false" disabled>
                                        <input type="number" id="otp4" name="emotp4" class="otp__field" placeholder="0" min="0" max="9" onpaste="return false" disabled>
                                    </div>

                                    <div class="submit">
                                        <input type="submit" value="Verify Email" class="btn btn--verify inactive" id="emailbtn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

    <!-- Java Script
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/verify.js"></script>
    <script src="https://kit.fontawesome.com/31062394fe.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        const otpform = document.querySelector('#otpform');
        
        $(document).ready(function () {

            otpform.addEventListener('submit', function (event) {
            event.preventDefault();
              
                var otp1 = $("#otp1").val();
                var otp2 = $("#otp2").val();
                var otp3 = $("#otp3").val();
                var otp4 = $("#otp4").val();

                if (otp1 !="" && otp2 !="" && otp3 !="" && otp4 !="") {
                    $.ajax({
                        url: 'verify.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            verify  : 1,
                            otp1    : otp1,
                            otp2    : otp2,
                            otp3    : otp3,
                            otp4    : otp4
                        }, success: function (response) {
                            if(response === 'Success')
                                location.href = "verify.php?mode=enter_phone_otp"
                            else
                            $('#error--text').html(response).css('color', "red");
                        }
                    });
                } else {
                    $('#error--text').html('All Input Fields Are Required!').css('color', "red");
                }

            });
        });
    </script>   

</body>
</html>