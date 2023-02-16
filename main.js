document.addEventListener("DOMContentLoaded", e => {
    let nav = document.getElementById("nav-button");
    nav.addEventListener("click", () => {
        window.scrollBy(0, window.innerHeight);
    });
})