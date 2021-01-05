import data from './getNick.js';

export default function setScore(score){
  $.ajax({
    url: '../app/updateScore.php',
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