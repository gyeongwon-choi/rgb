document.addEventListener("DOMContentLoaded", scrollMoveInit);

function scrollMoveInit() {
  const btnScrollMove = document.querySelectorAll("[data-scroll]");

  btnScrollMove.forEach((btn) => {
    btn.addEventListener("click", btnScrollMoveClickHandler);
  });

  function btnScrollMoveClickHandler() {
    window.scrollTo({
      top: this.dataset.scroll,
      behavior: "smooth",
    });
  }
}
