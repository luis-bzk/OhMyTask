(function () {
  const mobileMenuBtn = document.querySelector("#menu-mobile");
  const sidebar = document.querySelector(".sidebar");
  const closeMenuMobile = document.querySelector("#close-menu");

  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener("click", () => {
      sidebar.classList.add("show");
    });
  }

  if (closeMenuMobile) {
    closeMenuMobile.addEventListener("click", () => {
      sidebar.classList.add("hide");
      setTimeout(() => {
        sidebar.classList.remove("show");
        sidebar.classList.remove("hide");
      }, 300);
    });
  }

  // window client delete ".show"
  const clientWidth = document.body.clientWidth;

  window.addEventListener("resize", () => {
    const clientWidth = document.body.clientWidth;

    if (clientWidth >= 768) {
      sidebar.classList.remove("show");
    }
  });
})();
