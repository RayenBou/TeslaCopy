// $(function () {
//     // $(document).ready shorthand
//     $(".monster").fadeIn("slow");
// });

const title = document.querySelector(".title");
const checkpoint = [250, 850, 1450, 2050, 2650];
const fadeInCheckpoints = [370, 970, 1570, 2170, 2770];

const modelTab = [
  "Model Y",
  "Model 3",
  "Model S",
  "Model X",
  "Systèmes d'énergie solaire et Powerwalls",
  "Accessoires",
];
let opacity;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  //   console.log(currentScroll);
  // model y
  if (currentScroll <= checkpoint[0]) {
    opacity = 1 - currentScroll / checkpoint[0];
    document.querySelector(".hideme").innerText = modelTab[0];
  }

  if (currentScroll >= fadeInCheckpoints[0]) {
    opacity = currentScroll / fadeInCheckpoints[0] - 1;
    document.querySelector(".hideme").innerText = modelTab[1];
  }
  //   model 3
  if (checkpoint[0] <= currentScroll <= checkpoint[1]) {
    opacity = 1 - currentScroll / checkpoint[1];
    document.querySelector(".hideme").innerText = modelTab[1];
  }

  if (checkpoint[2] >= currentScroll >= fadeInCheckpoints[1]) {
    opacity = currentScroll / fadeInCheckpoints[1] - 1;
    document.querySelector(".hideme").innerText = modelTab[2];
  }
  //    model S
  if (checkpoint[1] <= currentScroll <= checkpoint[2]) {
    opacity = 1 - currentScroll / checkpoint[2];
    document.querySelector(".hideme").innerText = modelTab[2];
  }

  if (checkpoint[3] >= currentScroll >= fadeInCheckpoints[2]) {
    opacity = currentScroll / fadeInCheckpoints[2] - 1;
    document.querySelector(".hideme").innerText = modelTab[3];
  }
  // model x
  if (checkpoint[2] <= currentScroll <= checkpoint[3]) {
    opacity = 1 - currentScroll / checkpoint[3];
    document.querySelector(".hideme").innerText = modelTab[3];
  }

  if (checkpoint[4] >= currentScroll >= fadeInCheckpoints[3]) {
    opacity = currentScroll / fadeInCheckpoints[3] - 1;
    document.querySelector(".hideme").innerText = modelTab[4];
  }
  //   maison
  if (checkpoint[3] <= currentScroll <= checkpoint[4]) {
    opacity = 1 - currentScroll / checkpoint[4];
    document.querySelector(".hideme").innerText = modelTab[4];
  }

  if (checkpoint[5] >= currentScroll >= fadeInCheckpoints[4]) {
    opacity = currentScroll / fadeInCheckpoints[4] - 1;
    document.querySelector(".hideme").innerText = modelTab[5];
  }

  document.querySelector(".hideme").style.opacity = opacity;
});
