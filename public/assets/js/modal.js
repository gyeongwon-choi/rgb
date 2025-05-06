document.addEventListener("DOMContentLoaded", initModal);

function initModal() {
    const html = document.querySelector("html");
    const modalBtns = document.querySelectorAll("[data-modal-btn]");
    const modalRoot = document.querySelector("[data-modal-root='true']");
    const modalCloseBtns = modalRoot.querySelectorAll("[data-modal-close='true']");
    const modalBackdrop = modalRoot.querySelector("[data-modal-backdrop='true']");
    const modals = modalRoot.querySelectorAll("[data-modal-name]");

    modalBtns.forEach(btn => {
        btn.addEventListener("click", popBtnClickHandler);
    });
    modalCloseBtns.forEach(btn => {
        btn.addEventListener("click", popCloseBtnClickHandler);
    });
    modalBackdrop.addEventListener("click", modalBackdropClickHandler);

    function popBtnClickHandler() {
        modalRoot.classList.add('active');
        html.classList.add("u-modalOpened");
        modals.forEach(popup => {
            if(popup.dataset.modalName === this.dataset.modalBtn) {
                popup.classList.add("active");
            }
        });
    }
    function popCloseBtnClickHandler() {
        this.closest("[data-modal-name]").classList.remove("active");
        if(modalRoot.querySelectorAll("[data-modal-name].active").length === 0) {
            modalRoot.classList.remove('active');
            html.classList.remove("u-modalOpened");
        }
    }
    function modalBackdropClickHandler () {
        modalRoot.classList.remove('active');
        modals.forEach(popup => {
            popup.classList.remove("active");
        });
        html.classList.remove("u-modalOpened");
    }
    

    
}
