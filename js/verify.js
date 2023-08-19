const otp = document.querySelectorAll('.otp__field');
const verifybtn = document.querySelector('.btn--verify');

//focus on first input
otp[0].focus();

otp.forEach((field, index) => {
    field.addEventListener('keydown', (e) => {

        const currentInput = field,
        nextInput = field.nextElementSibling,
        prevInput = field.previousElementSibling;

        if (e.key >= 0 && e.key <=9){
            otp[index].value = "";
            setTimeout(() => {
                if (nextInput && nextInput.hasAttribute("disabled") && otp[index].value !== ""){
                    nextInput.removeAttribute("disabled");
                    otp[index+1].focus();
                }
            }, 4);
        }

        else if (e.key === 'Backspace'){
            setTimeout(() => {
                if (prevInput){
                    field.setAttribute("disabled", true);
                    currentInput.value = "";
                    otp[index-1].focus();
                }
            }, 4);
        }

        if (!otp[3].disabled && !otp[3].value !== ""){
            verifybtn.classList.remove("inactive");
            return;
        }
        
        verifybtn.classList.add("inactive");
        


    });
});

