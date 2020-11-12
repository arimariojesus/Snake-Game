var start;

$(document).ready(function() {
  $('#play').click(function() {
    start = setInterval(function() {
      $.ajax({
        url: '../bd/ranking.php',
        type: 'POST',
        dataType: 'html',
        success: function(data) {
          $('#ranking').empty().html(data);
        }
      });
  
      return false;
    }, 5000);
  });

  $('#home').click(function() {
    clearInterval(start);
  });
});