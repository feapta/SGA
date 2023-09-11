document.addEventListener("DOMContentLoaded", function(event) {
    relog();
});

    // RELOJ
setInterval(relog,1000);
    
function relog() {
    mydate = new Date();
    hora = mydate.getHours();
    minutos = mydate.getMinutes();
    segundos = mydate.getSeconds();
    day = mydate.getDate();
    month = mydate.getMonth()+1;
    year = mydate.getFullYear()

    if(hora < 10) { hora = '0' + hora; }
    if(minutos < 10) { minutos = '0' + minutos; }
    if(segundos < 10) { segundos = '0' + segundos; }

    if (year < 1000) { year += 1900; }
    if (month < 10) { month = "0" + month; }
    if (day < 10) { day = "0" + day; }

    document.querySelector(".relog").innerHTML = hora+':'+minutos+':'+segundos+ '  -  ' +day+" - "+month+" - "+year;
}
