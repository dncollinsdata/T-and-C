/**
 * T&C Integrity & Reliable — Custom Scripts
 */
(function($) {
  'use strict';

  /* --- Sticky header class toggle --- */
  $(window).on('scroll', function() {
    var $header = $('#main-header');
    if ($(this).scrollTop() > 100) {
      $header.addClass('tc-scrolled');
    } else {
      $header.removeClass('tc-scrolled');
    }
  });

  /* --- Scroll-triggered fade-in animation --- */
  function tcAnimateOnScroll() {
    var $els = $('.tc-animate');
    if (!$els.length) return;

    var windowBottom = $(window).scrollTop() + $(window).height();

    $els.each(function() {
      var $el = $(this);
      var elTop = $el.offset().top + 60;

      if (windowBottom > elTop && !$el.hasClass('tc-animate-in')) {
        $el.addClass('tc-animate-in');
      }
    });
  }

  $(window).on('scroll load', tcAnimateOnScroll);

  /* --- Smooth scroll for anchor links --- */
  $('a[href*="#"]:not([href="#"])').on('click', function(e) {
    var hash = this.hash;
    if (!hash) return;

    var $target = $(hash);
    if (!$target.length) return;

    e.preventDefault();
    $('html, body').animate({
      scrollTop: $target.offset().top - 80
    }, 600);
  });

  /* --- Mobile phone number click tracking --- */
  $('a[href^="tel:"]').on('click', function() {
    if (typeof gtag === 'function') {
      gtag('event', 'phone_call', {
        event_category: 'Contact',
        event_label: $(this).text().trim()
      });
    }
  });

  /* --- Counter animation for stats --- */
  function tcAnimateCounters() {
    var $counters = $('.tc-counter');
    if (!$counters.length) return;

    $counters.each(function() {
      var $this = $(this);
      if ($this.data('counted')) return;

      var windowBottom = $(window).scrollTop() + $(window).height();
      if (windowBottom < $this.offset().top + 30) return;

      $this.data('counted', true);
      var target = parseInt($this.data('target'), 10);
      var suffix = $this.data('suffix') || '';
      var duration = 2000;
      var start = 0;
      var startTime = null;

      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
        var current = Math.floor(eased * target);
        $this.text(current.toLocaleString() + suffix);
        if (progress < 1) {
          requestAnimationFrame(step);
        }
      }

      requestAnimationFrame(step);
    });
  }

  $(window).on('scroll load', tcAnimateCounters);

  /* --- Back to top button --- */
  var $backToTop = $('<button class="tc-back-to-top" aria-label="Back to top">&#8593;</button>');
  $('body').append($backToTop);

  $backToTop.css({
    position: 'fixed',
    bottom: '30px',
    right: '30px',
    width: '50px',
    height: '50px',
    background: '#2E7D32',
    color: '#fff',
    border: 'none',
    borderRadius: '50%',
    fontSize: '22px',
    cursor: 'pointer',
    zIndex: 9999,
    opacity: 0,
    visibility: 'hidden',
    transition: 'all 0.3s ease',
    boxShadow: '0 4px 15px rgba(0,0,0,0.2)'
  });

  $(window).on('scroll', function() {
    if ($(this).scrollTop() > 400) {
      $backToTop.css({ opacity: 1, visibility: 'visible' });
    } else {
      $backToTop.css({ opacity: 0, visibility: 'hidden' });
    }
  });

  $backToTop.on('click', function() {
    $('html, body').animate({ scrollTop: 0 }, 500);
  });

  $backToTop.on('mouseenter', function() {
    $(this).css('background', '#1B5E20');
  }).on('mouseleave', function() {
    $(this).css('background', '#2E7D32');
  });

})(jQuery);
