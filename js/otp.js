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
                        url: 'verifyphone.php',
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
                                location.href = "success.php"
                            else
                            $('#error--text').html(response).css('color', "red");
                        }
                    });
                } else {
                    $('#error--text').html('Please check your inputs').css('color', "red");
                }

            });
        });