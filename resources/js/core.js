$(document).ready(function() {
  $('input[name="daterange"]').daterangepicker();

  if ($('.searcher.aside').length > 0) {
    $('.searcher.aside').css({
      left: 'calc(50% + ' + (parseInt($('.header .container').width()) * .25) + 'px)',
    });
    $('.searcher.aside .search').css({
      width: (parseInt($('.header .container').width()) * .25) + 'px'
    });
    $('.searcher.aside').show();

    window.addEventListener('scroll', function(e) {
      var scrollY  = scrollTop = window.pageYOffset || document.documentElement.scrollTop;
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
    });
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
      document.location.href = '/venues';
    }
  }, '.searcher ul li a[href="#search"]');
});