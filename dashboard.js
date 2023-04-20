const sidebar = document.getElementById("sidebar");
const hamburger = document.getElementById("hamburger");
const header = document.getElementById("header");

hamburger.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  if (
    screen.width < 520 &&
    screen.width > 360 &&
    sidebar.classList.contains("close")
  ) {
    header.setAttribute("style", "visibility : visible");
  } else if (screen.width < 520) {
    header.setAttribute("style", "visibility : hidden");
  } else {
    header.setAttribute("style", "visibility : visible");
  }
});
