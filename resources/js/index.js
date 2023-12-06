function toggleMenu() {
  const menu = document.querySelector(".ul");
  const openIcon = document.querySelector(".openIcon");
  const closeIcon = document.querySelector(".closeIcon");

  menu.classList.toggle("open");
  openIcon.style.display = openIcon.style.display === "none" ? "flex" : "none";
  closeIcon.style.display =
    closeIcon.style.display === "flex" ? "none" : "flex";
}
