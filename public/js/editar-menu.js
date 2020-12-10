$(document).ready(function(){	
  $('.editar').on('click', function(e){
    e.preventDefault();

    $('input, select').not('.not-enable').prop('disabled', false);
    $('.hide').addClass('show');
    $('.hide').removeClass('hide');
  });
});
