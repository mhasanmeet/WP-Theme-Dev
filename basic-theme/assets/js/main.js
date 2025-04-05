// remove list style in multilevel for menus
var list = document.getElementsByTagName('li');

for (var i=0, max=list.length; i<max; i++){
    if(list[i].childNodes.length)
        list[i].style.listStyle = "none";
}

