// when the window is loaded activate the following
document.addEventListener('DOMContentLoaded', function() {
  var getMonsters = new XMLHttpRequest();
  getMonsters.open('GET', './php/ajax.php?table=bestiary', false);
  getMonsters.send();
  console.log(getMonsters.responseText);
})
