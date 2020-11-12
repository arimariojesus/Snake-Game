var data = {
  name: "",
  ip: ""
};

$(document).ready(function(){
  $('#play').click(async function(){
    data['name'] = $('#nickname').val();
    await fetch('https://api.ipify.org/?format=json')
      .then(results => results.json())
      .then(result => data['ip'] = result.ip);

    $.ajax({
      type: 'post',
      url: '../bd/include.php',
      data: data,
    });
  });
});

export default data;