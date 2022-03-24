document.addEventListener("DOMContentLoaded", function () {



    const regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercin


    let tex_ = document.getElementById("tex_");
    let enviar = document.getElementById("enviar");
    let unidades = document.getElementById("unidades");
    let horas = document.getElementById("horas");

    let datos;
    let tbody = document.getElementById("tbody");
    let url = "https://cima.aemps.es/cima/rest/medicamentos?nombre="// pagina para la busqueda de medicamentos
    let boton = document.getElementById("boton");
    let medicamento = document.getElementById("medicamento");
    let receta = document.getElementById("med");

    //validando las casillas
    tex_.className = "ok";
    tex_.addEventListener("blur", function (e) {


        let reg = regex.test(tex_.value.toLowerCase());


        if (reg) {

            console.log("Error_palabra falsa");
            tex_.className = "error";
            tex_.innerHTML = "PALABRA NO PERMITIDA"; //

            swal(
                "Aviso",
                "ESTAS COMPROMETIENDO LA BASE DE DATOS",
                "error"
            );
            tex_.focus;

        } else if (tex_.value.length > 98) {
            swal("Aviso ", "Caracteres superados, introduce menos palabras", "error");
            tex_.className = "error";
        } else if (tex_.value.length == 0) {
            swal("Aviso ", "Debe de introducir diagnostico", "error");
            tex_.className = "error";
        } else {
            tex_.className = "ok";
            // boton.removeAttribute("disabled","");

        }



    });

    horas.addEventListener("blur", function () {
        if (horas.value.length == 0) {
            horas.className = "ko";

        }
        if (horas.value.length > 0) {
            horas.className = "ok";
        }


    })
    unidades.addEventListener("blur", function () {
        if (unidades.value.length == 0) {
            unidades.className = "ko";

        }
        if (unidades.value.length > 0) {
            unidades.className = "ok";
        }


    })




    medicamento.addEventListener("click", function () { //si pulsamos busqueda de medicamentos, debe de estar escrito, realiza la busqueda y devuelve un maximo de 10 objetos 
        medicamento.className="ok";
    })
    boton.addEventListener("click", () => {
        if (medicamento.value.length == 0) {
            swal("Aviso ¡¡", "Escriba el nombre del medicamento", "info");

            medicamento.className="ko";
           
        } else {
            console.log("holaaa")
            // $("#boton")
            url += $("#medicamento").val();


            let conexion = new XMLHttpRequest();
            conexion.onreadystatechange = recibir;

            conexion.open("GET", url, true);
            conexion.send(null);
            console.log(url)

            function recibir() {
                if (conexion.readyState == 4 && conexion.status == 200) {
                    datos = JSON.parse(conexion.responseText);
                    // console.log(datos);
                    let longitud = datos['totalFilas'];
                    if (longitud > 10) longitud = 10;

                    /* console.log(datos['resultados']['0']['nombre']);
                     console.log(datos['resultados']['0']['labtitular']);//laboratorio
                     console.log(datos['resultados']['0'].cpresc);//receta/uso hospital
                     console.log(datos['resultados']['0'].nombre);//nombre
                     console.log(datos['resultados']['0'].)fotos[0].url;//foto
                     console.log(datos['resultados']['0'].viasAdministracion.nombre);//metodo de via
                     //console.log(datos['resultados']['0'].viasAdministracion[0].nombre);//metodo de via
                     console.log(datos['resultados']['0'].receta);//metodo de via*/
                    let td;
                    let tr;
                    let img;
                    let jose;

                    for (i = 0; i < longitud; i++) {//se pintan en forma de tabla y si se selecciona con el raton, nos lleva al foco del medicamento. 

                        // console.log(datos['resultados'][i].nombre);
                        //console.log(datos['resultados'][i].cpresc);//receta
                        //console.log(datos['resultados'][i].viasAdministracion[0].nombre);
                        //console.log(datos['resultados'][i].receta);//receta
                        //$("#table").html(datos.resultados[i].nombre);

                        tr = document.createElement("tr");
                        tbody.appendChild(tr)
                        td = document.createElement("td");
                        td.innerHTML = datos['resultados'][i].nombre;
                        tr.appendChild(td);
                        td.setAttribute("id", "nombre");

                        td.addEventListener("click", function (e) {
                            //receta= td.textContent
                            //console.log($("#nombre").val(this.innerText))
                            jose = e.target.innerHTML;//pegar el elemento al input
                           
                            //input.innerHTML =e.target.innerHTML;
                            //receta.innerHTML= jose;
                            $("#med").val(jose)
                            $("#med").focus();
                            console.log(jose)
                            


                        })

                        td = document.createElement("td");
                        td.innerHTML = datos['resultados'][i].receta;
                        tr.appendChild(td);
                        td.addEventListener("click", function (e) {
                            console.log(this)
                        })

                        td = document.createElement("td");
                        td.innerHTML = datos['resultados'][i].viasAdministracion[0].nombre;
                        tr.appendChild(td);


                        td = document.createElement("td");
                        img = document.createElement("img");
                        td.appendChild(img)
                        img.setAttribute("src", datos['resultados'][i].fotos[0].url)
                        //document.getElementsByTagName(img).src='\"'+datos['resultados'][i].fotos[0].url+'\"';
                        //console.log("\'"+datos['resultados'][i].fotos[0].url+"\'")
                        tr.appendChild(td);




                    }
                }
            }
        } 

    })

    let verifica = document.getElementById("form");//con todos los campos verdes, se activa para poder enviar, donde se inserta en historial y se borra de citas
    verifica.onmouseover = function () {
        console.log("hola")
       if(med.value.length>0 && tex_.className=="ok" && unidades.className=="ok" && horas.className=="ok" ){
   //         console.log("Verificando")
            enviar.className="ok";
             enviar.removeAttribute("disabled","");
         }
        //else {
   //         swal("ERROR", "Faltan", "error");
   //        

        //}
       
    }







})