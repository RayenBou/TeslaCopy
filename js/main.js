// $(function () {
//     // $(document).ready shorthand
//     $(".monster").fadeIn("slow");
// });

const title = document.querySelector(".title");
const checkpoint = 400;
const fadeInCheckpoints = [450, 700];
let opacity;

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    console.log(currentScroll);
    if (currentScroll <= checkpoint) {
        opacity = 1 - currentScroll / checkpoint;
    }
    if (currentScroll >= fadeInCheckpoints[0]) {
        console.log(fadeInCheckpoints);
        opacity = currentScroll / fadeInCheckpoints[0] - 1;
    }
    document.querySelector(".hideme").style.opacity = opacity;
});
