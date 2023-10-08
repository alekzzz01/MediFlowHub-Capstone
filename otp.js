const inputs = document.querySelectorAll("input"),
button = document.querySelector("button");

inputs.forEach((input, index1) =>{ 

    input.addEventListener("keyup", () => {

    const currentInput = input,
        nextInput = input.nextElementSibling,
        prevInput = input.previousElementSibling

        if(currentInput.value.length >1) {
            currentInput.value = "";
            return;
        }
        if(nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
            nextInput.removeAttribute("disabled")
            nextInput.focus();
        }


    });
});
    

window.addEventListener("load", () => inputs[0].focus());
 