window.addEventListener("DOMContentLoaded", () => {

    $("#loader").fadeOut(1500);
   let boton = document.getElementById("jose");
    let entrada = document.getElementById("loader");
   boton.addEventListener("onmouseover",advertencia)
    console.log("hola, tu que jaces");
    //entrada.fadeOut(2000);


  


function advertencia(){
    boton.className="btn btn-primary  rounded-circle icon-box-box slide-out-elliptic-top-fwd";
   
}
    
})


