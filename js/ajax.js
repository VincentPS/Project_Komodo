document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('startGet').onclick = function() {
    var getMonsters = new XMLHttpRequest();
    getMonsters.open('GET', './php/ajax.php?table=bestiary', false);
    getMonsters.send();
    console.log(getMonsters.responseText);
  }
})

// when the window is loaded activaten the folowing
window.onload = function() {

    // when the button is clicked get the bestiary table data
    document.getElementById('startGet').onclick = function() {
        var getMonsters = new XMLHttpRequest();
        getMonsters.open('GET', './php/ajax.php?table=bestiary', false);
        getMonsters.send();
        console.log(getMonsters.responseText);
    }
}