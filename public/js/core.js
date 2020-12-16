/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/core.js":
/*!******************************!*\
  !*** ./resources/js/core.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('input[name="daterange"]').daterangepicker();
  $('input.datepicker').daterangepicker({
    singleDatePicker: true
  });
  $('input.datetimepicker').daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    locale: {
      format: 'DD/M/Y hh:mm A'
    }
  });
  lightbox.option({
    albumLabel: "",
    showImageNumberLabel: false,
    positionFromTop: $(window).width() < 600 ? 50 : 100,
    maxHeight: parseInt($(window).height()) - ($(window).width() < 600 ? 0 : 350)
  });

  if ($('#home-carousel').length > 0) {
    var height = parseInt($(window).height()) - 156;

    if (height <= ($('#home-carousel').hasClass('venue-main-image') ? 480 : 630)) {
      $('#home-carousel').height(height + 'px');
      $('#home-carousel .carousel-inner').height(height + 'px');
    }
  }

  if ($('.searcher.aside').length > 0) {
    $('.searcher.aside').css({
      left: 'calc(50% + ' + parseInt($('.header .container').width()) * .25 + 'px)'
    });
    $('.searcher.aside .search').css({
      width: parseInt($('.header .container').width()) * .25 + 'px'
    });
    $('.searcher.aside').show();
  }

  if ($('.venue-characteristics').length > 0) {
    $('.venue-characteristics').css({
      left: 'calc(50% + ' + parseInt($('.header .container').width()) * .25 + 'px)',
      top: $('.venues-list').offset().top
    });
    $('.venue-characteristics ul').css({
      width: parseInt($('.header .container').width()) * .25 + 'px'
    });
    $('.venue-characteristics').show();
  }

  window.addEventListener('scroll', function (e) {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;

    if ($('.searcher.aside').length > 0) {
      var scrollTo = parseInt($('.venues-list').height()) + 260 - (parseInt($('.searcher.aside').height()) + 80);

      if (scrollY > 240 && scrollY < scrollTo) {
        $('.searcher.aside').css({
          position: 'fixed',
          top: '20px'
        });
      } else {
        if (scrollY > scrollTo) {
          $('.searcher.aside').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
        } else {
          $('.searcher.aside').css({
            position: 'absolute',
            top: '260px'
          });
        }
      }
    }

    if ($('.venue-characteristics').length > 0) {
      var scrollTo = parseInt($('.venue-detail').height()) + 260 - parseInt($('.venue-characteristics').height());

      if (scrollY > parseInt($('.venue-detail .shortcuts').offset().top) - 20 && scrollY < scrollTo) {
        $('.venue-characteristics').css({
          position: 'fixed',
          top: '20px'
        });

        if ($('.fixed-shortcuts').length == 0) {
          $('body').append('<div class="row fixed-shortcuts">' + $('.shortcuts').html() + '</div>');
          $('.fixed-shortcuts').css({
            width: parseInt($('.venue-detail .shortcuts').width()) + 102,
            left: parseInt($('.venue-detail .shortcuts').offset().left) - 35
          });
        } else {
          $('.fixed-shortcuts').css({
            position: 'fixed',
            top: 0
          });
        }
      } else {
        if (scrollY > scrollTo) {
          $('.venue-characteristics').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
          $('.fixed-shortcuts').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
        } else {
          $('.venue-characteristics').css({
            position: 'absolute',
            top: parseInt($('.venue-detail .shortcuts').offset().top) + 'px'
          });
          $('.fixed-shortcuts').css({
            position: 'absolute',
            top: parseInt($('.venue-detail .shortcuts').offset().top) - 20 + 'px'
          });
        }
      }
    }
  });
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($('.menu').hasClass('show')) {
        $('.menu').removeClass('show');
      } else {
        $('.menu').addClass('show');
      }
    }
  }, '.menu-toggle');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      $('input[name="daterange"]').click();
    }
  }, '.searcher ul li a[href="#date"]');
  $(document).on({
    click: function click(e) {
      if ($(window).width() < 600) {
        e.preventDefault();
      }
    }
  }, '.menu li.has-childs > a');
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($('.venues-menu ul').hasClass('show')) {
        $('.venues-menu ul').removeClass('show');
      } else {
        $('.venues-menu ul').addClass('show');
      }
    }
  }, '.venues-menu .toggle-venue-menu');
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($(this).closest('li').hasClass('open')) {
        $(this).closest('li').removeClass('open');
      } else {
        $(this).closest('li').addClass('open');
      }
    }
  }, '.searcher ul li a[href="#type"], .searcher ul li a[href="#quantity"], .searcher ul li a[href="#how"]');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var label = $(this).text();
      $(this).closest('li.open').find('a span').html(label);
      $(this).closest('li.open').find('input').val(label);
      $(this).closest('li.open').removeClass('open');
    }
  }, '.searcher ul li ul li a');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      document.location.href = '/oferta';
    }
  }, '.searcher ul li a[href="#search"]');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var top = parseInt($('a[name="' + $(this).attr('href').substr(1) + '"]').offset().top);
      $('html, body').stop().animate({
        scrollTop: top + 'px'
      }, 350);
    }
  }, '.shortcuts a, .fixed-shortcuts a');
  $(document).on({
    submit: function submit() {
      if ($(this).hasClass('invalid')) {
        e.preventDefault();
      }
    }
  }, 'form');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var form = $(this).closest('form');
      var formValid = true;
      form.attr('action', $(this).attr('href'));
      form.removeClass('invalid');
      form.find('.invalid').removeClass('invalid');
      formValid = validateFormFields(form);

      if (formValid == false) {
        form.addClass('invalid');
      } else {
        form.submit();
      }
    }
  }, '.submit-form');
  $(document).on({
    blur: function blur(e) {
      validateFormFields($(this).closest('form'), $(this).attr('id'));
    }
  }, '.request input[type=text], .request input[type=email]');
});

var validateFormFields = function validateFormFields(form, field) {
  var formValid = true;

  if (field != undefined) {
    if (form.find('#' + field).length > 0) {
      form.find('#' + field).removeClass('invalid');

      if (form.find('#' + field).parent().hasClass('required') && form.find('#' + field).val() == '') {
        form.find('#' + field).addClass('invalid');
        formValid = false;
      }

      if (field == 'email') {
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (!emailReg.test(form.find('#email').val())) {
          form.find('#email').addClass('invalid');
          formValid = false;
        }
      }
    }

    return formValid;
  }

  if (form.find('#first_name').length > 0) {
    if (form.find('#first_name').val() == '') {
      form.find('#first_name').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#email').length > 0) {
    emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (form.find('#email').val() == '' || !emailReg.test(form.find('#email').val())) {
      form.find('#email').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#phone').length > 0) {
    if (form.find('#phone').val() == '') {
      form.find('#phone').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#name').length > 0) {
    if (form.find('#name').val() == '') {
      form.find('#name').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#type').length > 0) {
    if (form.find('#type').val() == '') {
      form.find('#type').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#quantity').length > 0) {
    if (form.find('#quantity').val() == '') {
      form.find('#quantity').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#how').length > 0) {
    if (form.find('#how').val() == '') {
      form.find('#how').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#bed').length > 0) {
    if (form.find('#bed').val() == '') {
      form.find('#bed').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#size').length > 0) {
    if (form.find('#size').val() == '') {
      form.find('#size').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#start-date').length > 0) {
    if (form.find('#start-date').val() == '') {
      form.find('#start-date').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#end-date').length > 0) {
    if (form.find('#end-date').val() == '') {
      form.find('#end-date').addClass('invalid');
      formValid = false;
    }
  }

  return formValid;
};

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/core.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/navi/Work/Sites/ciudaddelsaber.org/eventos/comercial/resources/js/core.js */"./resources/js/core.js");


/***/ })

/******/ });