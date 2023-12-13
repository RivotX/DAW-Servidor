function registrar(){
    const login = document.getElementById("ladoazul");
    const text = document.getElementsByClassName("textooo")[0];
    const inputs= document.getElementsByClassName("inputs");

    for(var i=0;i<inputs.length;i++){

        inputs[i].value="";

    }
   

    
    
    

    if(luz){
        text.textContent="Sign in";
        login.style.left="15%"; 
        luz=false
    }else{
        
        text.textContent="Register";
        login.style.left="50%";
        luz=true;
    }

}

function inputIguales() {
    var campo1 = document.getElementById("clave1");
    var campo2 = document.getElementById("clave2");
    var mensaje = document.getElementById("mensaje");
    var submit = document.getElementById("enviar");
    


    if (campo2.value !== campo1.value) {
        mensaje.style.display = "block";
        submit.type="button"


    } else {
        mensaje.style.display = "none";
    submit.type="submit"

    }




}