$(document).ready(function() {
  $('input[name="daterange"]').daterangepicker();

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
});