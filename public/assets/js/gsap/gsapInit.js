if (document.querySelector("#scrollWrappper") && document.querySelector("#scrollContent")) {
  document.addEventListener("DOMContentLoaded", (event) => {
    gsap.registerPlugin(ScrollSmoother);

    ScrollSmoother.create({
      wrapper: "#scrollWrappper",
      content: "#scrollContent",
      smooth: 2,
      speed: 3,
      effects: true,
    });

    if(document.querySelector(".c-mainBanner2__effect")) {
      const mainBanner2PlugShow = gsap.timeline({
        scrollTrigger: {
          trigger: ".c-mainBanner2__effect",
          scrub: true,
        } 
      });
      mainBanner2PlugShow.to(".c-mainBanner2__effect", {
        x: "100%",
      });
    }

    if(document.querySelector(".c-mainBanner2__right")) {
      const mainBanner2PlugText = gsap.timeline({
        scrollTrigger: {
          trigger: ".c-mainBanner2__right",
          scrub: true,
          start: "top center",
          end: "top+=90 center",
        } 
      });
      mainBanner2PlugText.to(".c-mainBanner2__right", {
        y: 140,
      });
    }

  });
}