function fixHeadMenu() {
  const headerNav = document.getElementById("js_headerNavPanel");
  document.addEventListener("scroll", (e) => {
    if (window.scrollY > 400) {
      headerNav.classList.add("ly_headerMenuNav__fixed");
    } else {
      headerNav.classList.remove("ly_headerMenuNav__fixed");
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  fixHeadMenu();
});
