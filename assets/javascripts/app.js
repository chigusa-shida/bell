/**
 * テーマ用JavaScript（ビルド不要）
 * WordPress では jQuery が noConflict のため、jQuery を渡して実行
 */
(function ($) {
  'use strict';

  // ========== 共通（全ページ） ==========
  function initCommon() {
    var timer = false;
    $(window).resize(function () {
      if (timer !== false) {
        clearTimeout(timer);
      }
      timer = setTimeout(function () {
        location.reload();
      }, 200);
    });

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
    $(window).on('scroll', function () {
      if (2 < $(this).scrollTop()) {
        $('.p-header').attr('data-scroll', 'true');
      } else {
        $('.p-header').attr('data-scroll', '');
      }
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

    if ($('#js-swiper-home-pickUp').length && typeof Swiper !== 'undefined') {
      new Swiper('#js-swiper-home-pickUp', {
        slidesPerView: 2,
        spaceBetween: 25,
        breakpoints: {
          950: { slidesPerView: 5.2 },
          768: { slidesPerView: 4 },
          500: { slidesPerView: 3 }
        },
        pagination: {
          el: '#js-swiper-home-pickUp .swiper-pagination',
          type: 'progressbar'
        },
        navigation: {
          nextEl: '#js-swiper-home-pickUp .swiper-button-next',
          prevEl: '#js-swiper-home-pickUp .swiper-button-prev'
        }
      });
    }
  }

  // ========== 会社（設備） ==========
  function initCompany() {
    if ($('#js-company-office-img .swiper-main').length && typeof Swiper !== 'undefined') {
      new Swiper('#js-company-office-img .swiper-main', {
        loop: true,
        slidesPerView: 1,
        centeredSlides: true,
        speed: 2000,
        watchSlidesProgress: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
          waitForTransition: false
        },
        breakpoints: {
          768: {
            slidesPerView: 1.5,
            spaceBetween: 30
          }
        },
        pagination: {
          el: '#js-company-office-img .swiper-pagination',
          type: 'progressbar'
        },
        navigation: {
          nextEl: '#js-company-office-img .swiper-button-next',
          prevEl: '#js-company-office-img .swiper-button-prev'
        }
      });
    }
  }

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

    // 投稿スライド（単一投稿にスライダーがある場合）
    initPostSwiper();

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

  $(initRouter);

})(jQuery);
