import data from './getNick.js';

export default function setScore(score){
  $.ajax({
    url: '.api/',
    type: 'post',
    data: { score: score, 
            name: data['name'],
            ip: data['ip']
          }
  });
}