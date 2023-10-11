document.addEventListener("DOMContentLoaded", function () {

    window.addEventListener("alert", (event) => {
        
        let alertDiv = document.querySelector("#alert");
        let alertText = document.querySelector(".alertText");

        if (alertDiv) {
            alertText.textContent = event.detail.message;
            alertDiv.classList.add(event.detail.type);
            alertDiv.classList.remove("hide");

            
            setTimeout(function () {
                alertDiv.classList.add("hide");
                alertDiv.classList.remove(event.detail.type);
            }, 1500);
        }
    });

    let alertCloseButton = document.querySelector(".alertClose");
    let alertDiv = document.querySelector("#alert");


    alertCloseButton.addEventListener("click", function () {

        alertDiv.classList.add("hide");
    });
});
