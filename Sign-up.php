<?php
session_start();
include_once 'connect.php';
require "mail.php";

if (isset($_POST['EMAIL']) || isset($_POST['NAME']) || isset($_POST['NUMBER'])) {
    $name = $_POST['NAME'];
    $email = $_POST['EMAIL'];
    $number = $_POST['NUMBER'];
    $verification_status = "0";


    //CHECKING FIELD VALIDATIONS (Failsafe just in case JS Validation lets through)
    if (!empty($name) && !empty($email) && !empty($number)){
        //If email is valid
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            //Checking if email is already exists
            $sql = mysqli_query($conn, "SELECT email FROM subscribers WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0){
                echo "Email is Already Registered";
            } else {
                $sql = mysqli_query($conn, "SELECT phone FROM subscribers WHERE phone = '{$number}'"); 
                if (mysqli_num_rows($sql) > 0){
                    echo "Number Already Registered";
                } else {
                    $email_otp = mt_rand(1111,9999);
                    $phone_otp = mt_rand(1111,9999);
                    $expire = time() + (60 * 60);

                    //insert data
                    $sql2= mysqli_query($conn, "INSERT INTO subscribers (name, email, phone, email_otp, phone_otp, expire, verification_status) 
                    VALUES ('$name','$email','$number','$email_otp','$phone_otp', '$expire', '$verification_status')");
                    if ($sql2){
                        $sql3 = mysqli_query($conn, "SELECT * FROM subscribers WHERE email = '{$email}' AND phone = '{$number}'");
                        if(mysqli_num_rows($sql3)>0){
                            $data = mysqli_fetch_assoc($sql3); //fetch data
                            $_SESSION['id']= $data['id'];
                            $_SESSION['name'] = $data['name'];
                            $_SESSION['email'] = $data['email'];
                            $_SESSION['phone'] = $data['phone'];
                            $_SESSION['email_otp'] =$data['email_otp'];
                            $_SESSION['phone_otp'] =$data['phone_otp'];
                            $_SESSION['expire'] =$data['expire'];

                            //mail function

                            if ($data['phone_otp'] && $data['email_otp']) {
                                $email = $data['email'];
                                $emailotp = $data['email_otp'];

                                $headers=   array(
                                    "MIME-Version" => "1.0",
                                    "Content-Type" => "text/html;charset=UTF-8",
                                    "From" => "info@klaustoons.co.ke",
                                    "Reply-To" => "info@klaustoons.co.ke"

                                );

                                ob_start();

                                include ("htmlemail/htmlemail.php");

                                $maildata = ob_get_contents();

                                ob_get_clean();
                                
                                send_mail($email, "Account Verification", $maildata);

                            }
                        }
                    } else {
                        echo "Something went wrong while Subscribing you, Please Try Again.";
                    } 
                }
            }
        }else {
            echo "The email you entered is invalid";
        }
    }else{
        echo "All input Fields are required";
    }    
} else {    
    echo "Something went wrong while fetching your data, Try Again";
}

?>