jQuery(document).ready(function(){

// Stick Menu
jQuery(window).scroll(function() {

    var scroll = jQuery(window).scrollTop();
    if (scroll >= 300) {
        jQuery(".header__menu").addClass("fixed");
        jQuery(".header__mobile").addClass("fixed");
        jQuery(".header__main").addClass("fixed");
        jQuery(".header__main").css("marginTop", "40px");
    } else {
        jQuery(".header__menu").removeClass("fixed");
        jQuery(".header__mobile").removeClass("fixed");
        jQuery(".header__main").removeClass("fixed");
        jQuery(".header__main").css("marginTop", "unset");
    }

});

// Back To Top
var offset = 300,
offset_opacity = 1200,
scroll_top_duration = 700,
jQueryback_to_top = jQuery('.cd-top');
jQuery(window).scroll(function(){
( jQuery(this).scrollTop() > offset ) ? jQueryback_to_top.addClass('cd-is-visible') : jQueryback_to_top.removeClass('cd-is-visible cd-fade-out');
if( jQuery(this).scrollTop() > offset_opacity ) {
   jQueryback_to_top.addClass('cd-fade-out');
  }
  });
  //smooth scroll to top
  jQueryback_to_top.on('click', function(event){
    event.preventDefault();
    jQuery('body,html').animate({
    scrollTop: 0 ,
    }, scroll_top_duration
  );
});

// Test OWL
jQuery("#owl-spnb").owlCarousel({
	 loop:true,
   autoplay:true,
   autoplayTimeout:4000,
   autoplayHoverPause:true,
   responsive:{
        0:{
            items:1
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:true
        }
    },
 navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
});


var swiper1 = new Swiper('.swiper1', {
  slidesPerView: 4,
  spaceBetween: 10,
  autoplay: {
    delay: 5000,
  },
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next_1',
    prevEl: '.swiper-button-prev_1',
  },
  breakpoints: {
    1024: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    320: {
      slidesPerView: 2,
      spaceBetween: 10,
    }
  }
});



var swiper2 = new Swiper('.swiper2', {
 pagination: {
  el: '.swiper-pagination',
  clickable: true,
},
paginationClickable: true,
slidesPerView: 3,
spaceBetween: 30,
autoplay: {
  delay: 5000,
},
loop: true,
navigation: {
  nextEl: '.swiper-button-next_2',
  prevEl: '.swiper-button-prev_2',
},
breakpoints: {
  1024: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
  768: {
    slidesPerView: 2,
    spaceBetween: 30,
  },
  640: {
    slidesPerView: 1,
    spaceBetween: 20,
  },
  320: {
    slidesPerView: 1,
    spaceBetween: 10,
  }
}
});


jQuery("#scroller").simplyScroll({ orientation: 'vertical', customClass: 'vert', autoMode: 'loop' });



var swiper3 = new Swiper('.swiper3', {
  pagination: '.swiper-pagination3',
  paginationClickable: true,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2000,
  },
  slidesPerView: 8,
  breakpoints: {
    1024: {
      slidesPerView: 8,
      spaceBetween: 40,
    },
    768: {
      slidesPerView: 6,
      spaceBetween: 30,
    },
    640: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
    320: {
      slidesPerView: 4,
      spaceBetween: 10,
    }
  }
});

var swiper4 = new Swiper('.swiper4', {
  slidesPerView: 3,
  spaceBetween: 20,
  autoplay: {
    delay: 5000,
  },
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next_4',
    prevEl: '.swiper-button-prev_4',
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

// Display news about the project (cong-trinh) in the form of a swiper.
var swiper5 = new Swiper('.swiper5', {
  slidesPerView: 4,
  spaceBetween: 20,
  autoplay: {
    delay: 5000,
  },
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next_5',
    prevEl: '.swiper-button-prev_5',
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

var swiper6 = new Swiper('.swiper6', {
  slidesPerView: 4,
  spaceBetween: 20,
  autoplay: {
    delay: 5000,
  },
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next_6',
    prevEl: '.swiper-button-prev_6',
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

var swiper7 = new Swiper('.swiper7', {
  slidesPerView: 3,
  spaceBetween: 20,
  autoplay: {
    delay: 5000
  },
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next_7',
    prevEl: '.swiper-button-prev_7'
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

// END.

  new Swiper('.certificates-carousel', {
    slidesPerView: 3,
    spaceBetween: 12,
    navigation: {
      nextEl: '.swiper-button-next_8',
      prevEl: '.swiper-button-prev_8'
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 3,
      }
    }
  })

  // Gallery sản phẩm 
  jQuery('.gallery-sp').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.gallery-sp-nav'
  });

  jQuery('.gallery-sp-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.gallery-sp',
    dots: true,
    arrows: true,
    centerMode: true,
    focusOnSelect: true
  });

});

// ADD css class to make sidebar sticky
let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
let $singlePost = jQuery('.single-post');
let $singleProduct =  jQuery('.single-thanh-ly');
if ($singlePost.length > 0 || $singleProduct.length > 0) {
  let $sidebar = jQuery('#secondary');

  // Check if page is product or news
  if ($singleProduct.length > 0) {
    blockContent = jQuery('.block_thanhly');
  } else {
    blockContent = jQuery('.site-main');
  }
  window.addEventListener('scroll', function handleScroll() {
    const scrollTopPosition = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTopPosition >= 320) {
      $sidebar.addClass('scrollTopPosition320');
      $sidebar.removeClass('scrollTopPosition200');
      $sidebar.removeClass('scrollTopPositionFixed2Static');
    } else if (scrollTopPosition >= 200) {
      $sidebar.addClass('scrollTopPosition200');
      $sidebar.removeClass('scrollTopPosition320');
      $sidebar.removeClass('scrollTopPositionFixed2Static');
    } else {
      $sidebar.removeClass('scrollTopPosition200');
      $sidebar.removeClass('scrollTopPosition320');
      $sidebar.removeClass('scrollTopPositionFixed2Static');
    }

    if ((jQuery(window).scrollTop() + jQuery(window).height()) >= blockContent.height()) {
      $sidebar.addClass('scrollTopPositionFixed2Static');
      let marginTop = blockContent.height() - jQuery(window).height() - 100;
      $sidebar.css('margin-top', marginTop);
      $sidebar.removeClass('scrollTopPosition200');
      $sidebar.removeClass('scrollTopPosition320');
    } else {
      $sidebar.css('margin-top', '15px');
      $sidebar.removeClass('scrollTopPositionFixed2Static');
    }

    lastScrollTop = scrollTopPosition <= 0 ? 0 : scrollTopPosition;
  }, false);
}

(function () {
  'use strict';

  /* ---------- Mobile nav toggle ---------- */
  const navToggle = document.getElementById('navToggle');
  const nav = document.getElementById('primaryNav');
  if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      navToggle.classList.toggle('is-open', open);
      navToggle.setAttribute('aria-expanded', String(open));
    });
    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        nav.classList.remove('is-open');
        navToggle.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ---------- Reveal-on-scroll animations ---------- */
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && reveals.length) {
    const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    reveals.forEach((el) => observer.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('is-visible'));
  }

  /* ---------- WowSlider (image carousel) ---------- */
  const slider = document.getElementById('slider');
  const track = document.getElementById('sliderTrack');
  const prevBtn = document.getElementById('sliderPrev');
  const nextBtn = document.getElementById('sliderNext');
  const dotsWrap = document.getElementById('sliderDots');

  if (slider && track && dotsWrap) {
    const slides = track.children;
    const dots = dotsWrap.querySelectorAll('.slider__dot');
    const total = slides.length;
    let index = 0;
    let timerId = null;
    const AUTO_MS = 6000;

    const goTo = (i) => {
      index = (i + total) % total;
      track.style.transform = `translateX(-${index * 100}%)`;
      dots.forEach((dot, idx) => dot.classList.toggle('is-active', idx === index));
    };

    const next = () => goTo(index + 1);
    const prev = () => goTo(index - 1);

    const startAuto = () => {
      stopAuto();
      timerId = window.setInterval(next, AUTO_MS);
    };
    const stopAuto = () => {
      if (timerId) {
        window.clearInterval(timerId);
        timerId = null;
      }
    };

    nextBtn?.addEventListener('click', () => { next(); startAuto(); });
    prevBtn?.addEventListener('click', () => { prev(); startAuto(); });
    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => { goTo(idx); startAuto(); });
    });

    slider.addEventListener('mouseenter', stopAuto);
    slider.addEventListener('mouseleave', startAuto);

    /* Touch swipe */
    let touchStartX = 0;
    let touchDeltaX = 0;
    slider.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].clientX;
      touchDeltaX = 0;
      stopAuto();
    }, { passive: true });
    slider.addEventListener('touchmove', (e) => {
      touchDeltaX = e.touches[0].clientX - touchStartX;
    }, { passive: true });
    slider.addEventListener('touchend', () => {
      if (Math.abs(touchDeltaX) > 50) {
        if (touchDeltaX < 0) next(); else prev();
      }
      startAuto();
    });

    /* Keyboard support */
    slider.setAttribute('tabindex', '0');
    slider.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') { next(); startAuto(); }
      else if (e.key === 'ArrowLeft') { prev(); startAuto(); }
    });

    /* Pause auto when off-screen to save CPU */
    if ('IntersectionObserver' in window) {
      const visObs = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) startAuto();
          else stopAuto();
        });
      }, { threshold: 0.2 });
      visObs.observe(slider);
    } else {
      startAuto();
    }
  }

  /* ---------- Form submit (no backend yet) ---------- */
  const form = document.getElementById('contactForm');
  const success = document.getElementById('formSuccess');
  if (form) {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const name = form.querySelector('input[name="name"]');
      const phone = form.querySelector('input[name="phone"]');
      let valid = true;
      [name, phone].forEach((field) => {
        if (!field || !field.value.trim()) {
          valid = false;
          if (field) field.style.borderColor = 'var(--color-accent)';
        } else if (field) {
          field.style.borderColor = '';
        }
      });
      if (!valid) return;

      const submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.setAttribute('disabled', 'true');
        submitBtn.style.opacity = '0.7';
      }

      window.setTimeout(() => {
        if (success) success.hidden = false;
        form.reset();
        if (submitBtn) {
          submitBtn.removeAttribute('disabled');
          submitBtn.style.opacity = '';
        }
        success?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }, 700);
    });
  }
})();