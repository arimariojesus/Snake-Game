import data from './getNick.js';

export default function setScore(score){
  $.ajax({
    url: '../bd/updateScore.php',
    type: 'post',
    data: { score: score, 
            name: data['name'],
            ip: data['ip']
          },
    success: function (response) {
        console.log(response);
    }
  });
}