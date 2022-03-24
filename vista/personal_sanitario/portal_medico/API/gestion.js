document.addEventListener("DOMContentLoaded", function () {

    const regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercion de elementos no permitidos


let tex_= document.getElementById("tex_");
let boton = document.getElementById("jj")
let receta = document.getElementById("flexCheckDefault");
let p = document.getElementById("p");
let formulario = document.getElementById("formulario");

tex_.addEventListener("blur", function (e) {//al insertar el tratamiento habilita el boton de enviar 
     
    tex_.className = "form-control";
    let reg = regex.test(tex_.value.toLowerCase());
    

    if (reg) {
     
      console.log("Error_palabra falsa");
      tex_.className = "error";
      tex_.innerHTML = "PALABRA NO PERMITIDA"; //

      swal(
        "Aviso",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );tex_.focus;
     
    }else if(tex_.value.length>98){
        swal("Aviso ", "Caracteres superados, introduce menos palabras", "error");
        tex_.className = "ko";
    }else if(tex_.value.length==0){
        swal("Aviso ", "Debe de introducir diagnostico", "error");
        tex_.className = "ko";
    }
    else{    
        tex_.className = "ok";
        boton.removeAttribute("disabled","");
        boton.className= "btn btn-success col-12";
        
       
        
    }
    

  });

  receta.addEventListener("click",function(){// si esta actiba, por defecto si, nos lleva a la pagina de donde podremos seleccionar medicinias y dosis, si no directamente guarda la cita con el tratamiento
    if(receta.checked==true){
     
      p.removeAttribute("hidden");
      formulario.setAttribute("action","api.php")
      p.innerHTML="Debera de introducir medicamentos";
  
    }
     if(receta.checked==false){
    
      p.setAttribute("hidden","");
      formulario.setAttribute("action","../../../controlador/insertar_historial_sin.php")
    }
  })

  tex_.addEventListener("click",function(){
    tex_.className = "form-control";
  
    boton.setAttribute("disabled","");
  })


})