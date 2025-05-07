document.addEventListener("DOMContentLoaded", function () {
  /* main mainSmart slide */
  if (document.querySelector('[data-splide="mainSmart"] .splide')) {
    const mainPcSplide = new Splide('[data-splide="mainSmart"] .splide', {
      perPage: 1,
      pagination: true,
      arrows: false,
      autoScroll: false,
      drag:false,
      breakpoints: {
        767: {
          drag:true,
        },
      }
    });

    mainPcSplide.on("ready", function() {
      const slides = mainPcSplide.root.querySelectorAll(".splide__slide");
      const activeIndex = Array.from(slides).findIndex(item => item.classList.contains("is-active"));
      mainPcSplide.root.setAttribute("data-slide-active",activeIndex);
      
      const paginations = mainPcSplide.root.querySelectorAll(".splide__pagination > li > button");
      
      paginations.forEach((item, idx) => {
        item.setAttribute("data-index", idx);

        item.addEventListener("click", function() {
          mainPcSplide.root.setAttribute("data-slide-active",this.dataset.index);
        });

    });

    });

    mainPcSplide.mount(window.splide.Extensions);

    mainPcSplide.on("moved", function() {
      const slides = mainPcSplide.root.querySelectorAll(".splide__slide");
      const activeIndex = Array.from(slides).findIndex(item => item.classList.contains("is-active"));

      mainPcSplide.root.setAttribute("data-slide-active",activeIndex);
    });
  }
  /* achievements slide1 */
  if (document.querySelector('[data-splide="partners1"] .splide')) {
    const mainPcSplide = new Splide('[data-splide="partners1"] .splide', {
      direction: "rtl",
      fixedWidth: "250px",
      height: "155px",
      gap: "20px",
      type: "loop",
      drag: "free",
      focus: "center",
      perPage: 7,
      arrows: false,
      autoScroll: {
        speed: 0.5,
      },
      breakpoints: {
        767: {
          fixedWidth: "150px",
          height: "93px",
          gap: "10px",
        },
      }
    });
    mainPcSplide.mount(window.splide.Extensions);
  }
  /* achievements slide2 */
  if (document.querySelector('[data-splide="partners2"] .splide')) {
    const mainPcSplide = new Splide('[data-splide="partners2"] .splide', {
      direction: "ltr",
      fixedWidth: "250px",
      height: "155px",
      gap: "20px",
      type: "loop",
      drag: "free",
      focus: "center",
      perPage: 7,
      arrows: false,
      autoScroll: {
        speed: 0.5,
      },
      breakpoints: {
        767: {
          fixedWidth: "150px",
          height: "93px",
          gap: "10px",
        },
      }
    });
    mainPcSplide.mount(window.splide.Extensions);
  }
  /* achievements slide3 */
  if (document.querySelector('[data-splide="partners3"] .splide')) {
    const mainPcSplide = new Splide('[data-splide="partners3"] .splide', {
      direction: "rtl",
      fixedWidth: "250px",
      height: "155px",
      gap: "20px",
      type: "loop",
      drag: "free",
      focus: "center",
      perPage: 7,
      arrows: false,
      autoScroll: {
        speed: 0.5,
      },
      breakpoints: {
        767: {
          fixedWidth: "150px",
          height: "93px",
          gap: "10px",
        },
      }
    });
    mainPcSplide.mount(window.splide.Extensions);
  }
});
