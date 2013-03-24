$('#video').on('show', function () {
  $('div.modal-body').html('<iframe width="640" height="360" src="http://www.youtube.com/embed/B52fUubeMb0?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
});
$('#video').on('hide', function () {
  $('div.modal-body').html('');  
});