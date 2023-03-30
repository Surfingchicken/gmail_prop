document.addEventListener("DOMContentLoaded", e => {
    let nav = document.getElementById("nav-button");
    let Switch = new Boolean(false)

    nav.addEventListener("click", () => {
        if (Switch == false){
            document.getElementById("inscr").scrollIntoView();
            Switch = true;
        }
        else{
            document.getElementById("accueil").scrollIntoView();
            Switch = false;
        }
    });
})