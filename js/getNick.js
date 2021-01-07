var data = {
  name: "",
  ip: "",
  score: 0,
};

$(document).ready(function(){
  $('#play').click(async function(){
    data['name'] = $('#nickname').val();
    await fetch('https://api.ipify.org/?format=json')
      .then(results => results.json())
      .then(result => data['ip'] = result.ip);

    $.ajax({
      type: 'post',
      url: 'api/',
      data: data,
    });
  });
});

export default data;