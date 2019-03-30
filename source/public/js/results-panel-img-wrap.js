var mustUpdateNbColumns = true;
window.onload = update;
mustUpdateNbColumns = false;

window.onresize = update;

function update() {
  var width = $("#results-panel")[0].clientWidth;

  if(mustUpdateNbColumns) {

  }

  switch(nbColumns) {
    case 4:

      break;
    case 2:

      break;
  }
}
