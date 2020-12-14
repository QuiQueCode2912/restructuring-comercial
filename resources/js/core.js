$(document).ready(function() {
  $('input[name="daterange"]').daterangepicker();
  $('input.datepicker').daterangepicker({
    singleDatePicker:true
  });
  $('input.datetimepicker').daterangepicker({
    singleDatePicker:true,
    timePicker:true,
    locale:{
      format: 'DD/M/Y hh:mm A'
    }
  });

  lightbox.option({
    albumLabel: "",
    showImageNumberLabel: false,
    positionFromTop: 100,
    maxHeight: (parseInt($(window).height()) - 350)
  });

  if ($('#home-carousel').length > 0) {
    var height = (parseInt($(window).height()) - 156);
    if (height <= ($('#home-carousel').hasClass('venue-main-image') ? 480 : 630)) {
      $('#home-carousel').height(height + 'px');
      $('#home-carousel .carousel-inner').height(height + 'px');
    }
  }

  if ($('.searcher.aside').length > 0) {
    $('.searcher.aside').css({
      left: 'calc(50% + ' + (parseInt($('.header .container').width()) * .25) + 'px)',
    });
    $('.searcher.aside .search').css({
      width: (parseInt($('.header .container').width()) * .25) + 'px'
    });
    $('.searcher.aside').show();
  }

  if ($('.venue-characteristics').length > 0) {
    $('.venue-characteristics').css({
      left: 'calc(50% + ' + (parseInt($('.header .container').width()) * .25) + 'px)',
      top: $('.venues-list').offset().top
    });
    $('.venue-characteristics ul').css({
      width: (parseInt($('.header .container').width()) * .25) + 'px'
    });
    $('.venue-characteristics').show();
  }

  window.addEventListener('scroll', function(e) {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    
    if ($('.searcher.aside').length > 0) {
      var scrollTo = (parseInt($('.venues-list').height()) + 260) - (parseInt($('.searcher.aside').height()) + 80);
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
      var scrollTo = (parseInt($('.venue-detail').height()) + 260) - parseInt($('.venue-characteristics').height());
      if (scrollY > (parseInt($('.venue-detail .shortcuts').offset().top) - 20) && scrollY < scrollTo) {
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
            top: (parseInt($('.venue-detail .shortcuts').offset().top) - 20) + 'px'
          });     
        }
      }
    }
  });

  $(document).on({
    click: function(e) {
      e.preventDefault();
      $('input[name="daterange"]').click();
    }
  }, '.searcher ul li a[href="#date"]');

  $(document).on({
    click: function(e) {
      e.preventDefault();
      if ($(this).closest('li').hasClass('open')) {
        $(this).closest('li').removeClass('open');
      } else {
        $(this).closest('li').addClass('open');
      }
    }
  }, '.searcher ul li a[href="#type"], .searcher ul li a[href="#quantity"], .searcher ul li a[href="#how"]');

  $(document).on({
    click: function(e) {
      e.preventDefault();
      var label = $(this).text();
      $(this).closest('li.open').find('a span').html(label);
      $(this).closest('li.open').find('input').val(label);
      $(this).closest('li.open').removeClass('open');
    }
  }, '.searcher ul li ul li a');

  $(document).on({
    click: function(e) {
      e.preventDefault();
      document.location.href = '/oferta';
    }
  }, '.searcher ul li a[href="#search"]');

  $(document).on({
    click: function(e) {
      e.preventDefault();
      var top = parseInt($('a[name="' + $(this).attr('href').substr(1) + '"]').offset().top);
      $('html, body').stop().animate({ scrollTop:top + 'px'}, 350);
    }
  }, '.shortcuts a, .fixed-shortcuts a');
});