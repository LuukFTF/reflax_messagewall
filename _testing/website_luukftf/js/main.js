let contactLink = document.getElementById("contact");

contactLink.addEventListener("click", clickHandler);

console.log("javascript loaded");

function clickHandler(e){
    console.log("bruh");
    e.preventDefault()
    window.scroll({
        behavior: "smooth",
        lef: 0,
        top: 1000
    });
}
