window.addEventListener("DOMContentLoaded", () => {


    let año_mes_dia = document.getElementById("hoy_es")
    let reloj = document.getElementById("hora")
    let hoy = new Date();
    let año  = hoy.getFullYear();
    let dia = hoy.getDate();
    let mes = hoy.getMonth();
  
    año_mes_dia.textContent = "Hoy es "+ dia +"-"+mes+"-"+año;
 

    function move() {
        let hoy = new Date();
        hora = hoy.getHours()
        minuto = hoy.getMinutes()
        segundo = hoy.getSeconds()
        time = hora + " : " + minuto + " : " + segundo;
        reloj.textContent= time;

    }
    
setInterval(function(){move()},1000)
   

})