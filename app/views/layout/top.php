<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>플럭시티<?php if (!empty($pageTitlePath)) echo ' ' . htmlspecialchars($pageTitlePath); ?></title>
    <link rel="stylesheet" href="/assets/css/master.css" />

    <script defer="defer" src="/assets/js/splide/splide.min.js"></script>
    <script defer="defer" src="/assets/js/splide/splide-extension-auto-scroll.min.js"></script>
    <script defer="defer" src="/assets/js/splide/splideInit.js"></script>

    <script defer="defer" src="/assets/js/gsap/gsap.min.js"></script>
    <script defer="defer" src="/assets/js/gsap/ScrollTrigger.min.js"></script>
    <script defer="defer" src="/assets/js/gsap/ScrollSmoother.min.js"></script>
    <script defer="defer" src="/assets/js/gsap/gsapInit.js"></script>
    
    <script defer="defer" src="/assets/js/modal.js"></script>
    <script defer="defer" src="/assets/js/scrollTo.js"></script>
    
  </head>
  <body>

    <header class="c-header">
      <div class="l-headerContainer">
        <div class="c-header__inner">
          <div class="c-header__left">
            <a href="/">
              <h1 class="c-header__logo">
                <div class="u-irBlock">PLUXITY</div>
              </h1>
            </a>
            <nav class="c-headerNav">
              <ul class="c-headerNav__menuBox">
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="/about">
                    ABOUT
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Who we are
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="/achievements">
                        Achievements
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Parents & Awards
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="javascript:void(0);">
                    OUT TECH
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Digital twin
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Our service
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Extended service
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="javascript:void(0);">
                    PLUG
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Smart City
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Smart Industry
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Digital SOC
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Sports & Leisure
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="javascript:void(0);">
                    CAREER
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Our culture
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Recruitment
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="/news">
                    NEWS
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="/news">
                        News & Notice
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Our works
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Newsletter
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="c-headerNav__menu">
                  <a class="c-headerNav__menuLink" href="/inquiry/create">
                    CONTACT US
                  </a>
                  <ul class="c-headerNav__menuBox2">
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="/inquiry/create">
                        Inquiry
                      </a>
                    </li>
                    <li class="c-headerNav__menu2">
                      <a class="c-headerNav__menuLink2" href="javascript:void(0);">
                        Location
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="c-headerNav__logos">
                <div class="c-headerNav__logoBox">
                  <div class="c-headerNav__logoWrap">
                    <img class="c-headerNav__logo" src="/assets/images/logos/logo_header_safer.svg" alt="스마트 건설 안전 플랫폼">
                  </div>
                  <div class="c-headerNav__logoTitle">스마트 건설 안전 플랫폼</div>
                </div>
                <div class="c-headerNav__logoBox">
                  <div class="c-headerNav__logoWrap">
                  <img class="c-headerNav__logo" src="/assets/images/logos/logo_header_golf.svg" alt="스마트 골프 플랫폼">
                  </div>
                  <div class="c-headerNav__logoTitle">스마트 골프 플랫폼</div>
                </div>
              </div>
              <div class="c-headerNav__backdrop">
                <div class="u-irBlock">내비게이션 배경</div>
              </div>
            </nav>
          </div>
          <ul class="c-header__languages">
            <li class="c-header__language">
              <a class="c-header__languageLink c-header__languageLink--active" href="javascript:void(0);">
                KR
              </a>
            </li>
            <li class="c-header__language">
              <a class="c-header__languageLink" href="javascript:void(0);">
                EN
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    
    <div id="scrollWrappper">
      <div id="scrollContent">
    
        <main class="c-main">