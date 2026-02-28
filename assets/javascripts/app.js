/**
 * テーマ用JavaScript（ビルド不要）
 * WordPress では jQuery が noConflict のため、jQuery を渡して実行
 */
(function ($) {
  'use strict';

  // ========== 共通（全ページ） ==========
  function initCommon() {
    // var timer = false;
    // $(window).resize(function () {
    //   if (timer !== false) {
    //     clearTimeout(timer);
    //   }
    //   timer = setTimeout(function () {
    //     location.reload();
    //   }, 200);
    // });

    $(window).on('load resize', function () {
      var height = $('#header').height();
      $('#js-main').css('margin-top', height + 10);
    });

    // PC: ドロップダウン
    if ($(window).innerWidth() > 949) {
      $('.js-dropdown_link').hover(
        function () {
          $(this).children('.js-dropdown_contents').stop().slideDown();
        },
        function () {
          $(this).children('.js-dropdown_contents').stop().slideUp();
        }
      );
    } else {
      var $megamenu = $('.js-dropdown_contents');
      var btnSubmenu = '<button type="button" class="p-gnav__bottomMenu--btn"></button>';
      $megamenu.prev('a').append(btnSubmenu);
      $('.p-gnav__bottomMenu--btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this).closest('li');
        var menu = $this.children('.js-dropdown_contents');
        menu.slideToggle();
        $(this).toggleClass('is-open');
      });
    }

    // スクロールでヘッダー
    // $(window).on('scroll', function () {
    //   if (2 < $(this).scrollTop()) {
    //     $('.p-header').attr('data-scroll', 'true');
    //   } else {
    //     $('.p-header').attr('data-scroll', '');
    //   }
    // });

    // ハンバーガーメニュー
    $('.p-header__btn').on('click', function () {
      var $content = $('.p-header__content');
      $('.p-header__btn').toggleClass('close');
      $content.fadeToggle(500, function () {
        if ($content.is(':visible')) {
          $('body, html').css('overflow', 'hidden');
          $content.css({
            'max-height': '90vh',
            'overflow-y': 'auto'
          });
        } else {
          $('body, html').css('overflow', '');
          $content.css({ 'max-height': '', 'overflow-y': '' });
        }
      });
    });

    // トップへ戻るボタン
    var pageTop = $('#page-top');
    pageTop.hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        pageTop.fadeIn();
      } else {
        pageTop.fadeOut();
      }
    });
    pageTop.click(function () {
      $('body,html').animate({ scrollTop: 0 }, 500);
      return false;
    });
    $(window).on('scroll', function () {
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();
      var footHeight = $('.p-footer__bottom').outerHeight() + 60;
      if (scrollHeight - scrollPosition <= footHeight) {
        $('#page-top').css({ position: 'absolute', bottom: footHeight, width: '100%' });
      } else {
        $('#page-top').css({ position: 'fixed', bottom: '60px', width: '' });
      }
    });
  }

  // ========== スムーススクロール（#リンク） ==========
  function initScroll() {
    $('a[href^="#"]').click(function () {
      var speed = 500;
      var adjust = $('header').height();
      var href = $(this).attr('href');
      var target = $(href === '#' || href === '' ? 'html' : href);
      var position = target.offset().top - adjust;
      $('body,html').animate({ scrollTop: position }, speed, 'swing');
      return false;
    });
  }

  // ========== Swiper: 投稿スライド ==========
  function initPostSwiper() {
    if ($('#js-post-slide .swiper-main').length && typeof Swiper !== 'undefined') {
      new Swiper('#js-post-slide .swiper-main', {
        loop: true,
        centeredSlides: true,
        speed: 2000,
        watchSlidesProgress: true,
        pagination: {
          el: '#js-post-slide .swiper-pagination',
          type: 'progressbar'
        },
        navigation: {
          nextEl: '#js-post-slide .swiper-button-next',
          prevEl: '#js-post-slide .swiper-button-prev'
        }
      });
    }
  }

  // ========== ホーム ==========
  function initHome() {
    $('#jsi-tab_area .u-tab_btn').click(function () {
      var index = $('#jsi-tab_area .u-tab_btn').index(this);
      $('#jsi-tab_area .u-tab_btn, #jsi-tab_area .u-tab_panel').removeClass('active');
      $(this).addClass('active');
      $('#jsi-tab_area .u-tab_panel').eq(index).addClass('active');
    });

    if ($('#js-swiper-home-notice').length && typeof Swiper !== 'undefined') {
      new Swiper('#js-swiper-home-notice', {
        direction: 'vertical',
        effect: 'slide',
        slidesPerView: 1,
        loop: true,
        autoplay: {
          delay: 5000,
          reverseDirection: true,
          disableOnInteraction: false
        },
        speed: 2000
      });
    }

    // if ($('#js-swiper-home-pickUp').length && typeof Swiper !== 'undefined') {
    //   new Swiper('#js-swiper-home-pickUp', {
    //     slidesPerView: 2,
    //     spaceBetween: 25,
    //     breakpoints: {
    //       950: { slidesPerView: 5.2 },
    //       768: { slidesPerView: 4 },
    //       500: { slidesPerView: 3 }
    //     },
    //     pagination: {
    //       el: '#js-swiper-home-pickUp .swiper-pagination',
    //       type: 'progressbar'
    //     },
    //     navigation: {
    //       nextEl: '#js-swiper-home-pickUp .swiper-button-next',
    //       prevEl: '#js-swiper-home-pickUp .swiper-button-prev'
    //     }
    //   });
    // }
  }

  // ========== 会社（設備） ==========
  // function initCompany() {
  //   if ($('#js-company-office-img .swiper-main').length && typeof Swiper !== 'undefined') {
  //     new Swiper('#js-company-office-img .swiper-main', {
  //       loop: true,
  //       slidesPerView: 1,
  //       centeredSlides: true,
  //       speed: 2000,
  //       watchSlidesProgress: true,
  //       autoplay: {
  //         delay: 5000,
  //         disableOnInteraction: false,
  //         waitForTransition: false
  //       },
  //       breakpoints: {
  //         768: {
  //           slidesPerView: 1.5,
  //           spaceBetween: 30
  //         }
  //       },
  //       pagination: {
  //         el: '#js-company-office-img .swiper-pagination',
  //         type: 'progressbar'
  //       },
  //       navigation: {
  //         nextEl: '#js-company-office-img .swiper-button-next',
  //         prevEl: '#js-company-office-img .swiper-button-prev'
  //       }
  //     });
  //   }
  // }

  // ========== オンラインショップ ==========
  function initOnlineshop() {
    $(window).scroll(function () {
      var pagetop = $('.p-shop-bottomMenu');
      var scroll = $(window).scrollTop() + $(window).height();
      var footer = $('footer').offset().top;
      var absoluteBottom = $('footer').outerHeight();
      if ($(window).scrollTop() > $(window).height()) {
        pagetop.fadeIn(300);
      } else {
        pagetop.fadeOut(300);
      }
      if (scroll > footer) {
        pagetop.css({ position: 'absolute', bottom: absoluteBottom, width: '100%' });
      } else {
        pagetop.css({ position: 'fixed', bottom: '0', width: '100%' });
      }
    });
  }

  // ========== アコーディオン（FAQ等） ==========
  function initAccordion() {
    $('#js-accordion .u-accordion-question').click(function () {
      $(this).toggleClass('open');
      $(this).next().slideToggle();
      $('#js-accordion .u-accordion-question').not($(this)).next().slideUp();
      $('#js-accordion .u-accordion-question').not($(this)).removeClass('open');
    });
  }

  // ========== ルーティング ==========
  function initRouter() {
    var path = location.pathname.replace(/\/$/, '') || '/';
  
    // 共通
    initCommon();
  
    // 投稿スライド
    initPostSwiper();
  
    // ★ TeamsSnap（要素がある & PC幅のときだけ内部で動く）
    initTeamsSnap();
  
    // ページ別
    if (path === '' || path === '/') {
      initHome();
    } else if (path === '/company') {
      initCompany();
      initScroll();
    } else if (path === '/faq') {
      initAccordion();
    } else if (path === '/onlineshop') {
      initAccordion();
      initOnlineshop();
    } else if (path === '/product' || path === '/recruit') {
      initScroll();
    } else if (path.indexOf('/recruit/recruitment') === 0) {
      initScroll();
    }
  }

  function initTeamsSnap() {
    const MQ = window.matchMedia("(min-width: 950px)");
    if (!MQ.matches) return;
  
    // ロック対象 = slider-part
    const section = document.querySelector("#teamsSnap");
    if (!section) return;
  
    if (window.__teamsSnapInited) return;
    window.__teamsSnapInited = true;
  
    const panels = Array.from(section.querySelectorAll(".snap__panel"));
    const dots = Array.from(section.querySelectorAll(".snap__dot"));
  
    const header = document.querySelector("#header") || document.querySelector("header");
    const OFFSET = 20;
    const headerLine = () => (header ? header.getBoundingClientRect().height : 0) + OFFSET;
  
    const viewport = section.querySelector(".snap__viewport");
    if (!viewport) return;
  
    let index = 0;
    let locked = false;
    let lockY = 0;
  
    let accumulated = 0;
    let lastStepAt = 0;
    const threshold = 80;
    const cooldownMs = 550;
  
    let suppressUntil = 0;
    const suppressMs = 700;
  
    // ★ slider-part上端を「ヘッダー下」に合わせるY（rectベースでズレない）
    const getLockY = () => {
      const rect = section.getBoundingClientRect();
      return window.scrollY + rect.top - headerLine();
    };
  
    // ★ トリガー：slider-partの上端がヘッダー下に来たら
    const isAtTrigger = () => {
      const rect = section.getBoundingClientRect();
      const trigger = headerLine();
      return rect.top <= trigger && rect.bottom > trigger;
    };
  
    // ★ 「表示中パネル分」だけ高さにする（画面が低い時は上限）
    function fitSnapViewport() {
      if (!MQ.matches) return;
    
      const activePanel = panels[index];
      if (!activePanel) return;
    
      const career = activePanel.querySelector(".p-career");
      if (!career) return;
    
      const padding = 20;
      const available = window.innerHeight - headerLine() - 40; // 画面内上限
      const need = career.getBoundingClientRect().height + padding;
    
      // ★ 高さだけ制御（overflowはCSS任せ）
      viewport.style.height = `${Math.min(need, available)}px`;
    }
    
    const setActive = (i) => {
      const next = Math.max(0, Math.min(panels.length - 1, i));
  
      viewport.classList.remove("is-fadeout");
      viewport.classList.add("is-fading");
  
      // 一旦消す
      panels.forEach((p) => p.classList.remove("is-active"));
  
      setTimeout(() => {
        index = next;
  
        panels.forEach((p, pi) => p.classList.toggle("is-active", pi === index));
        dots.forEach((d, di) => d.classList.toggle("is-active", di === index));
  
        fitSnapViewport();
  
        viewport.classList.remove("is-fading");
        viewport.classList.add("is-fadeout");
        setTimeout(() => viewport.classList.remove("is-fadeout"), 1200);
      }, 200);
    };
  
    const lockPage = () => {
      locked = true;
      accumulated = 0;
  
      const y = getLockY();
      window.scrollTo({ top: y, behavior: "auto" });
      lockY = y;
    };
  
    // ★ 解除：下へ抜ける → slider-partの「下端」までスクロールした位置へ
    const unlockToDown = () => {
      locked = false;
      suppressUntil = Date.now() + suppressMs;
  
      const rect = section.getBoundingClientRect();
      const y = window.scrollY + rect.bottom - headerLine() + 40;
      lockY = y;
      window.scrollTo({ top: y, behavior: "auto" });
    };
  
    // ★ 解除：上へ戻る → slider-partの「上端」の少し上へ
    const unlockToUp = () => {
      locked = false;
      suppressUntil = Date.now() + suppressMs;
  
      const rect = section.getBoundingClientRect();
      const y = window.scrollY + rect.top - headerLine() - 40;
      lockY = y;
      window.scrollTo({ top: y, behavior: "auto" });
    };
    const onResize = () => {
      if (MQ.matches) {
        // PCのままなら高さ追従
        fitSnapViewport();
        return;
      }
    
      // 950px未満に落ちたら：ロック解除＆インラインstyleを掃除
      locked = false;
      suppressUntil = Date.now() + 2000;
      window.__teamsSnapInited = false;
    
      // ★ ここ重要：インラインの高さを消す（CSSのheight:autoが効くようになる）
      viewport.style.height = "";
      // もし過去にoverflowを触っていたなら（今は触ってないけど念のため）
      viewport.style.overflow = "";
    
      // 黒幕クラスも念のため消す
      viewport.classList.remove("is-fading", "is-fadeout");
    };
    window.addEventListener("resize", onResize);
  
    // ロック中はページスクロールを固定
    window.addEventListener(
      "scroll",
      () => {
        if (!MQ.matches) return;
        if (!locked) return;
        if (Math.abs(window.scrollY - lockY) > 1) window.scrollTo(0, lockY);
      },
      { passive: true }
    );
  
    const stepOnce = (dir) => {
      if (dir > 0 && index === panels.length - 1) return unlockToDown();
      if (dir < 0 && index === 0) return unlockToUp();
      setActive(index + dir);
    };
  
    window.addEventListener(
      "wheel",
      (e) => {
        if (!MQ.matches) return;
        if (Date.now() < suppressUntil) return;
  
        if (!locked && !isAtTrigger()) return;
        if (!locked) lockPage();
  
        e.preventDefault();
  
        const now = Date.now();
        if (now - lastStepAt < cooldownMs) return;
  
        accumulated += e.deltaY;
        if (Math.abs(accumulated) >= threshold) {
          lastStepAt = now;
          stepOnce(accumulated > 0 ? 1 : -1);
          accumulated = 0;
        }
      },
      { passive: false }
    );
  
    dots.forEach((dot, i) => dot.addEventListener("click", () => setActive(i)));
  
    // 初期化
    setActive(0);
    fitSnapViewport();
  }

  document.addEventListener("DOMContentLoaded", () => {
    const flows = document.querySelectorAll(".js-flow");
  
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-active");
          }
        });
      },
      {
        root: null,
        threshold: 0.2,   // 20%見えたら発火
      }
    );
  
    flows.forEach(el => observer.observe(el));
  });

  $(initRouter);

})(jQuery);
