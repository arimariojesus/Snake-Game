var start;

const createTable = (data) => {
  const table = `<table> ` +
                data.map((d) => `
                <tr>
                  <td align="left">${d.name}</td>
                  <td align="right">${d.score}</td>
                </tr>`).join('')
              + `</table>`;
  return table;
}

$(document).ready(function() {
  $('#play').click(function() {
    start = setInterval(function() {
      $.ajax({
        url: 'api/',
        type: 'get',
        dataType: 'json',
        success: (response) => {
          const table = createTable(response);
          $('#ranking').empty().html(table);
        }
      });
  
      return false;
    }, 3000);
  });

  $('#home').click(function() {
    clearInterval(start);
  });
});