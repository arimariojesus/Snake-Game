import data from './getNick.js';

export default function setScore(score){
  data['score'] = score;
  $.ajax({
    url: 'api/',
    type: 'put',
    data: data,
  });
}