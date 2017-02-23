document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('startGet').onclick = function() {
    var getMonsters = new XMLHttpRequest();
    getMonsters.open('GET', './php/ajax.php?table=bestiary', false);
    getMonsters.send();
    console.log(getMonsters.responseText);
  }
})
