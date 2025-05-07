document.addEventListener("DOMContentLoaded", menuInit);

function menuInit() {
    const menuTrigger = document.querySelector("[data-menu-trigger='menu']");
    const menuTarget = document.querySelector("[data-menu-target='menu']");

    menuTrigger.addEventListener("click", menuTriggerClickHandler);

    function menuTriggerClickHandler() {
        if(this.classList.contains("active")) {
            document.body.classList.remove("u-menuOpened");
            menuTrigger.classList.remove("active");
            menuTarget.classList.remove("active");
        }else {
            document.body.classList.add("u-menuOpened");
            menuTrigger.classList.add("active");
            menuTarget.classList.add("active");
        }
    }
}