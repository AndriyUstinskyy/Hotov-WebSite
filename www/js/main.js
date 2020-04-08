$('.menu-toggle').click(function() {

  $('.site-nav').toggleClass('site-nav--open', 500);
  $(this).toggleClass('open');

})
$( document ).ready(function() {
  // Main variables
  var $aboutTitle = $('.about-myself .content h2');
  var $developmentWrapper = $('.development-wrapper');
  var developmentIsVisible = false;


  /* ####### HERO SECTION ####### */

  $('.hero .content .header').delay(500).animate({
    'opacity':'1',
    'top': '50%'
  },1000);


  $(window).scroll( function(){

    var bottom_of_window = $(window).scrollTop() + $(window).height();

    /* ##### ABOUT MYSELF SECTION #### */
    if( bottom_of_window > ($aboutTitle.offset().top + $aboutTitle.outerHeight())){
      $('.about-myself .content h2').addClass('aboutTitleVisible');
    }
    /* ##### EXPERIENCE SECTION #### */

    // Check the location of each element hidden */
    $('.experience .content .hidden').each( function(i){

      var bottom_of_object = $(this).offset().top + $(this).outerHeight();

      /* If the object is completely visible in the window, fadeIn it */
      if( bottom_of_window > bottom_of_object ){

        $(this).animate({
          'opacity':'1',
          'margin-left': '0'
        },600);
      }
    });

    /*###### SKILLS SECTION ######*/

    var middle_of_developmentWrapper = $developmentWrapper.offset().top + $developmentWrapper.outerHeight()/2;

    if((bottom_of_window > middle_of_developmentWrapper)&& (developmentIsVisible == false)){

      $('.skills-bar-container li').each( function(){

        var $barContainer = $(this).find('.bar-container');
        var dataPercent = parseInt($barContainer.data('percent'));
        var elem = $(this).find('.progressbar');
        var percent = $(this).find('.percent');
        var width = 0;

        var id = setInterval(frame, 15);

        function frame() {
          if (width >= dataPercent) {
            clearInterval(id);
          } else {
            width++;
            elem.css("width", 100-(3*width)+"%");
            percent.html(width+"min");
          }
        }
      });
      developmentIsVisible = true;
    }
  }); // -- End window scroll --
});
'use strict';

function SebastianCarousel(e, t) {
  if (!e) throw new Error('The element is required.');
  this.element = e, this.options = this.mergeOptions(t), this.setup();
}

SebastianCarousel.prototype = {
  namespace: 'sebas-carousel',
  index: 0,
  isActivated: !1,
  interval: null,
  slides: [],
  bullets: [],
  setup: function () {
    var e = this, t = this.namespace;
    if (this.element.classList.add(t), this.element.classList.add(t + '--' + this.options.effect), this.element.classList.add(t + '--' + this.options.theme), 0 === this.options.theme.indexOf('content-')) {
      var i = this.element.querySelector('[data-sc-slider]');
      i && (this.element = i);
    }
    var s = this.createElement('UL', t + '__bullets');
    if (this.element.children.length) {
      if (1 === this.element.children.length) this.element.children[0].classList.add(t + '__slide--active'), this.element.children[0].classList.add(t + '__slide'), this.index = 0; else {
        for (var a = 0; a < this.element.children.length; a++) {
          var n = this.element.children[a], l = this.createElement('LI', t + '__bullet');
          l.setAttribute('data-index', a), l.addEventListener('click', function (t) {
            var i = t.target;
            e.resetTimer(), e.goToSlide(i.getAttribute('data-index'));
          }), 0 === a && (n.classList.add(t + '__slide--active'), l.classList.add(t + '__bullet--active')), 1 === a && n.classList.add(t + '__slide--next'), a === this.element.children.length - 1 && n.classList.add(t + '__slide--prev'), s.appendChild(l), n.classList.add(t + '__slide');
        }
        this.element.appendChild(s), this.bullets = this.element.querySelectorAll('.' + t + '__bullet');
        var r = this.createElement('A', t + '__left'), h = this.createElement('A', t + '__right');
        this.element.appendChild(r), this.element.appendChild(h), h.addEventListener('click', function () {
          e.resetTimer(), e.slide('right');
        }), r.addEventListener('click', function () {
          e.resetTimer(), e.slide('left');
        }), window.addEventListener('resize', function () {
          e.updateHight();
        }), this.options.autoStart && this.setTimer();
      }
      this.slides = this.element.querySelectorAll('.' + t + '__slide'), this.updateHight();
    }
  },
  slide: function (e) {
    e && e.match(/^(?:left|right)$/) || (e = 'right');
    var t = this.slides.length - 1, i = this.namespace + '__slide--active', s = this.namespace + '__slide--prev',
      a = this.namespace + '__slide--next', n = this.namespace + '__bullet--active';
    switch (this.element.querySelector('.' + i).classList.remove(i), this.element.querySelector('.' + s).classList.remove(s), this.element.querySelector('.' + a).classList.remove(a), this.element.querySelector('.' + n).classList.remove(n), e) {
      case'left':
        this.index = 0 === this.index ? t : this.index - 1;
        break;
      case'right':
        this.index = this.index === t ? 0 : this.index + 1;
    }
    var l = 0 === this.index ? t : this.index - 1, r = this.index === t ? 0 : this.index + 1;
    this.slides[l].classList.add(this.namespace + '__slide--prev'), this.slides[this.index].classList.add(this.namespace + '__slide--active'), this.slides[r].classList.add(this.namespace + '__slide--next'), this.bullets[this.index].classList.add(this.namespace + '__bullet--active'), this.updateHight();
  },
  goToSlide: function (e) {
    e = 'number' != typeof e ? parseInt(e) : e;
    var t = this.slides.length - 1;
    this.index = 0 === e ? t : e > t ? t : e - 1, this.slide();
  },
  setTimer: function () {
    var e = this;
    this.interval = setInterval(function () {
      e.slide('right');
    }, e.options.interval);
  },
  resetTimer: function () {
    this.interval && (this.stopTimer(), this.setTimer());
  },
  stopTimer: function () {
    this.interval && (clearInterval(this.interval), this.interval = null);
  },
  updateHight: function () {
    this.element.style.height = this.slides[this.index].scrollHeight + 'px';
  },
  createElement: function (e, t) {
    if ('string' != typeof e || 'string' != typeof t) throw new Error('Parameters should be of type string.');
    var i = document.createElement(e);
    return i.className = t, i;
  },
  mergeOptions: function (e) {
    var t = {effect: 'fade', pagination: !0, showArrows: !0, autoStart: !1, theme: 'fullwidth', interval: 3e3};
    if (e) for (var i in t) t.hasOwnProperty(i) && e.hasOwnProperty(i) && this.sanitizeOptions(i, e[i]) && (t[i] = e[i]);
    return t;
  },
  sanitizeOptions: function (e, t) {
    var i, s = 'The option ' + e + ' does not have a valid value.';
    switch (e) {
      case'effect':
        i = !!t.match(/^(?:fade|slide)$/), s += ' The value should be either fade or slide';
        break;
      case'theme':
        i = !!t.match(/^(?:fullwidth|content-dark|content-light|social|editorial)$/), s += ' The value is not a valid theme.';
        break;
      case'pagination':
      case'autoStart':
      case'showArrows':
        i = 'boolean' == typeof t, s += ' The value should be a boolean.';
        break;
      case'interval':
        i = 'number' == typeof t && t > 200, s += ' The value should be a number greater than 200';
    }
    return i || console.warn(s), i;
  },
  version: '1.0.1'
}, document.addEventListener('DOMContentLoaded', function () {
  var e = document.querySelectorAll('[data-sc]');
  if (e) for (var t = 0; t < e.length; t++) {
    var i = {};
    e[t].getAttribute('data-sc-theme') && (i.theme = e[t].getAttribute('data-sc-theme')), e[t].getAttribute('data-sc-interval') && (i.interval = parseInt(e[t].getAttribute('data-sc-interval'))), e[t].getAttribute('data-sc-autostart') && (i.autoStart = 'true' === e[t].getAttribute('data-sc-autostart')), e[t].getAttribute('data-sc-pagination') && (i.pagination = 'true' === e[t].getAttribute('data-sc-pagination')), e[t].getAttribute('data-sc-effect') && (i.effect = e[t].getAttribute('data-sc-effect')), new SebastianCarousel(e[t], i);
  }
});



$(document).ready(function()
{
  $('.contact1').click(function (e)
  {
    $('.card').toggleClass('active');
    $('.banner').toggleClass('active');
    $('.photo').toggleClass('active');
    $('.social-media-banner').toggleClass('active');
    $('.email-form').toggleClass('active');
    var buttonText = $('button.contact1#main-button').text();
    if (buttonText === 'Повернути')
    {
      buttonText = 'Надішліть нам лист';
      $('button.contact1#main-button').text(buttonText);
    }
    else
    {
      buttonText = 'Повернути';
      $('button.contact1#main-button').text(buttonText);
    }
  });
});


$(document).ready(function()
{
  $('.contact2').click(function (e)
  {
    $('.card').toggleClass('active');
    $('.banner').toggleClass('active');
    $('.photo').toggleClass('active');
    $('.social-media-banner').toggleClass('active');
    $('.email-form').toggleClass('active');
    var buttonText = $('button.contact2#main-button').text();
    if (buttonText === 'Назад')
    {
      buttonText = 'Пришлите нам письмо';
      $('button.contact2#main-button').text(buttonText);
    }
    else
    {
      buttonText = 'Назад';
      $('button.contact2#main-button').text(buttonText);
    }
  });
});
//turn on to make the photo follow mouse
// $(document).ready(function()
// {
//     $(document).mousemove(function( event )
//     {
//         var docWidth = $(document).width();
//         var docHeight = $(document).height();
//         var xValue = (event.clientX/docWidth)*100;
//         var yValue = (event.clientY/docHeight)*100;
//         $('.photo').css('background-position', xValue+'%,'+yValue+'%');
//     });
// });


