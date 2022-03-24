window.addEventListener("DOMContentLoaded", () => {
console.log("hola")
  let confimar = document.getElementById("confirmar");
  let borrar = document.getElementById("eliminar")

    confimar.addEventListener("click", function () { //primero escoger 
     if( confirmar.checked==true){
        eliminar.className= "col-12 btn btn-success ok"
        eliminar.removeAttribute("disabled", "")
        }
      
      

           

        
    })




})