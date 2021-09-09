
$(document).ready(function(){
  $('.mychoice').change(function(event) {
  var id = $(this).val();
  $.ajax({ //Process the form using $.ajax()
    type: 'post',
    url: 'isset.php',
    dataType: "json",
    data: {id:id},
    success   : function() {
      $('tr#'+id+'').css('background-color', '#ccc');
      $('tr#'+id+'').fadeOut('fast');
    }
  });

  });
});