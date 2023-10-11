document.addEventListener("DOMContentLoaded", function () {
    const desktopUsername = document.querySelector("#desktop-username");
    const mobileUsername = document.querySelector("#mobile-username");
    window.addEventListener("username", (e) => {
        desktopUsername.textContent = e.detail.username
        mobileUsername.textContent = e.detail.username
    });
});
