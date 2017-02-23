window.onload = function() {
    console.log('1');
    document.getElementById('startGet').onclick = function() {
        console.log('2');
        var getMonsters = new XMLHttpRequest();
        console.log('3');
        getMonsters.open('GET', './php/ajax.php?table=bestiary', false);
        console.log('4');
        getMonsters.send();
        console.log(getMonsters.responseText);
    }
}
