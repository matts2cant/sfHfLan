$(document).ready(function(){

  $('.dropdown-toggle').dropdown();
  $(".alert-message").alert();

  // add on logic
  // ============

  $('.add-on :checkbox').click(function () {
    if ($(this).attr('checked')) {
      $(this).parents('.add-on').addClass('active');
    } else {
      $(this).parents('.add-on').removeClass('active');
    }
  });

  // POSITION STATIC TWIPSIES
  // ========================

  $(window).bind( 'load resize', function () {
    $(".twipsies a").each(function () {
       $(this)
        .twipsy({
          live: false
        , placement: $(this).attr('title')
        , trigger: 'manual'
        , offset: 2
        })
        .twipsy('show')
      })
  })

  $('a.link-to-fieldset').click(function() {
    field = $(this).attr('href').substr(1, $(this).attr('href').length);
    $(window).scrollTop($('#sf_fieldset_'+field).position().top - 50);
    return false;
  });

  $('#more-filters').click(function() {
    $('#modal-more-filters').modal({
      keyboard: true,
      backdrop: true,
      show:     true
    });
    return false;
  });

  $('#close-modal-filters').click(function() {
    $('#modal-more-filters').modal('hide');
  });
});

/**
 * Function to copy ids[] on a batch actions to and hidden fields because checkboxes
 * can't be into a form
 */
function copyIds()
{
  $('.sf_admin_batch_checkbox:checked').each(function() {
    $('#batch_checked_ids').append('<option value="'+$(this).val()+'" selected="selected">'+$(this).val()+'</option>');
  });
}

