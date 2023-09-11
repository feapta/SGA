// Hce que el aside ocupe toda la pantalla
$(document).ready(function(){
    var height = $(window).height()/10 - 26.8;

    document.querySelector('aside').style.minHeight = `${height}rem`;
});