(function ($) {
  'use strict';

  // ========== 共通（全ページ） ==========
  function initCommon() {
    $(window).on('load resize', function () {
      var height = $('#header').height();
      $('#js-main').css('margin-top', height + 10);
      document.documentElement.style.setProperty('--header-height', height + 10 + 'px');
    });

    // SPだけ：2階層で3階層を持つ項目は開閉だけにする
    document.querySelectorAll('.p-gnav__bottom .sub-menu .menu-item-has-children > a').forEach(link => {
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 949) {
          e.preventDefault();
          const parent = this.parentElement;
          parent.classList.toggle('open');
        }
      });
    });

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
  }

  // ========== スムーススクロール（同一ページ内 + 他ページからのハッシュリンク対応） ==========
  function initScroll() {
    var speed = 500;
  
    function getHeaderHeight() {
      return $('#header').outerHeight() || $('header').outerHeight() || 0;
    }
  
    function cleanUrl() {
      if (history.replaceState) {
        history.replaceState(null, '', location.pathname + location.search);
      }
    }
  
    function scrollToTarget($target, shouldCleanUrl) {
      if (!$target.length) return;
  
      var position = $target.offset().top - getHeaderHeight();
  
      $('html, body').stop().animate(
        { scrollTop: position },
        speed,
        'swing',
        function () {
          if (shouldCleanUrl) {
            cleanUrl();
          }
        }
      );
    }
  
    function scrollToHash(hash, shouldCleanUrl) {
      if (!hash) return;
  
      if (hash === '#') {
        $('html, body').stop().animate(
          { scrollTop: 0 },
          speed,
          'swing',
          function () {
            if (shouldCleanUrl) {
              cleanUrl();
            }
          }
        );
        return;
      }
  
      var $target = $(hash);
      if (!$target.length) return;
  
      scrollToTarget($target, shouldCleanUrl);
    }
  
    // PAGE TOP
    $(document)
      .off('click.pageTop')
      .on('click.pageTop', '#page-top a[href="#"], .js-page-top[href="#"]', function (e) {
        e.preventDefault();
        scrollToHash('#', true);
      });
  
    // ハッシュリンク全般
    $(document)
      .off('click.smoothScroll')
      .on('click.smoothScroll', 'a[href*="#"]', function (e) {
        var href = $(this).attr('href');
        if (!href) return;
  
        var url = new URL(href, location.href);
        var currentPath = location.pathname.replace(/\/$/, '') || '/';
        var linkPath = url.pathname.replace(/\/$/, '') || '/';
  
        // href="#"
        if (url.hash === '#') {
          e.preventDefault();
          scrollToHash('#', true);
          return;
        }
  
        // 同一ページ内
        if (url.hash && currentPath === linkPath) {
          var $target = $(url.hash);
          if (!$target.length) return;
  
          e.preventDefault();
          scrollToHash(url.hash, true);
          return;
        }
  
        // 別ページ + ハッシュ
        if (url.hash && currentPath !== linkPath) {
          sessionStorage.setItem('initialHash', url.hash);
        }
      });
  
    // 別ページから来たハッシュを処理
    var initialHash = sessionStorage.getItem('initialHash');
  
    if (initialHash) {
      sessionStorage.removeItem('initialHash');
  
      if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
      }
  
      $(window).on('load', function () {
        setTimeout(function () {
          window.scrollTo(0, 0);
          scrollToHash(initialHash, true);
        }, 150);
      });
    } else if (location.hash && location.hash !== '#') {
      // 直接URLに /page/#access で来た場合
      var hash = location.hash;
  
      if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
      }
  
      $(window).on('load', function () {
        setTimeout(function () {
          window.scrollTo(0, 0);
          scrollToHash(hash, true);
        }, 150);
      });
    }
  }

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
  }

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

  function initProductCategoryNav() {
    const navItems = document.querySelectorAll('.p-product-category__navItem');
    const sections = document.querySelectorAll('.p-product-category__section[id]');
    const header = document.querySelector('#header');
  
    if (!navItems.length || !sections.length) return;
  
    let isJumping = false;
    let jumpTimer = null;
  
    function setActiveNav(id) {
      navItems.forEach((item) => {
        const link = item.querySelector('a');
        if (!link) return;
        item.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
      });
    }
  
    function updateActiveNav() {
      if (isJumping) return;
  
      const headerHeight = header ? header.offsetHeight : 0;
      const targetLine = headerHeight + 80;
  
      let currentId = sections[0].id;
  
      sections.forEach((section) => {
        const rect = section.getBoundingClientRect();
        if (rect.top <= targetLine) {
          currentId = section.id;
        }
      });
  
      setActiveNav(currentId);
    }
  
    navItems.forEach((item) => {
      const link = item.querySelector('a');
      if (!link) return;
  
      link.addEventListener('click', function () {
        const targetId = this.getAttribute('href').replace('#', '');
        if (!targetId) return;
  
        isJumping = true;
        setActiveNav(targetId);
  
        clearTimeout(jumpTimer);
        jumpTimer = setTimeout(() => {
          isJumping = false;
          updateActiveNav();
        }, 700);
      });
    });
  
    window.addEventListener('load', updateActiveNav);
    window.addEventListener('scroll', updateActiveNav, { passive: true });
    window.addEventListener('resize', updateActiveNav);
  }

  // ========== ルーティング ==========
  function initRouter() {
    var path = location.pathname.replace(/\/$/, '') || '/';

    initCommon();
    initProductCategoryNav();
    initScroll(); // ← 全ページで実行
    initTeamsSnap();

    if (path === '' || path === '/') {
      initHome();
    } else if (path === '/faq') {
      initAccordion();
    } else if (path === '/onlineshop') {
      initAccordion();
      initOnlineshop();
    }
  }

  function initTeamsSnap() {
    const MQ = window.matchMedia("(min-width: 950px)");
    if (!MQ.matches) return;

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

    const getLockY = () => {
      const rect = section.getBoundingClientRect();
      return window.scrollY + rect.top - headerLine();
    };

    const isAtTrigger = () => {
      const rect = section.getBoundingClientRect();
      const trigger = headerLine();
      return rect.top <= trigger && rect.bottom > trigger;
    };

    function fitSnapViewport() {
      if (!MQ.matches) return;

      const activePanel = panels[index];
      if (!activePanel) return;

      const career = activePanel.querySelector(".p-career");
      if (!career) return;

      const padding = 20;
      const available = window.innerHeight - headerLine() - 40;
      const need = career.getBoundingClientRect().height + padding;

      viewport.style.height = `${Math.min(need, available)}px`;
    }

    const setActive = (i) => {
      const next = Math.max(0, Math.min(panels.length - 1, i));

      viewport.classList.remove("is-fadeout");
      viewport.classList.add("is-fading");

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

    const unlockToDown = () => {
      locked = false;
      suppressUntil = Date.now() + suppressMs;

      const rect = section.getBoundingClientRect();
      const y = window.scrollY + rect.bottom - headerLine() + 40;
      lockY = y;
      window.scrollTo({ top: y, behavior: "auto" });
    };

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
        fitSnapViewport();
        return;
      }

      locked = false;
      suppressUntil = Date.now() + 2000;
      window.__teamsSnapInited = false;

      viewport.style.height = "";
      viewport.style.overflow = "";
      viewport.classList.remove("is-fading", "is-fadeout");
    };
    window.addEventListener("resize", onResize);

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
        threshold: 0.2,
      }
    );

    flows.forEach(el => observer.observe(el));
  });

  $(initRouter);

})(jQuery);