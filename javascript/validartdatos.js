function validarDatos() {
    var tdocumento=document.getElementById('tipo_documento').value;
    var numero=document.getElementById('tnum').value;
    
    if(tdocumento.length == 0 || numero.length == 0){
        return swal("Campos vacios","Por favor llenar los campos vacios","warning");
    }
    if(tdocumento == "DNI"){
        if(numero.length !=  8){
            return swal("El DNI debe tener 8 dígitos","El campo DNI debe tener 8 digitos","warning");
        }else {
            swal("DNI Correcto", "El DNI de la persona es correcto", "success");
        }
        /* Verifico que el campo no contenga letras */
        var ok = 1;
        for (i = 0; i < numero.length && ok == 1; i++) {
            var n = parseInt(numero.charAt(i));
            if (isNaN(n)) ok = 0;
        }
        if (ok == 0) {
            return swal("No se permite Letras en DNI", "No puede ingresar caracteres en el DNI", "warning");
        }
       
    }   
    if(tdocumento == "RUC"){
        if(numero.length != 11){
            return swal("RUC debe tener 11 dígitos","El campo RUC debe contener 11 digitos","warning");
        }else {
            swal("RUC Correcto", "El número de RUC de la persona es correcto", "success");
        }
        /* Verifico que el campo no contenga letras */
        var ok = 1;
        for (i = 0; i < numero.length && ok == 1; i++) {
            var n = parseInt(numero.charAt(i));
            if (isNaN(n)) ok = 0;
        }
        if (ok == 0) {
            return swal("No se permite Letras en RUC", "No puede ingresar caracteres en el RUC", "warning");
        }
    }
    if(tdocumento == "PASAPORTE"){
        if(numero.length != 12){
            return swal("El PASAPORTE debe tener 12 dígitos","El campo numero PASAPORTE debe contener 12 digitos","warning");
        }else {
            swal("El PASAPORTE es Correcto", "El PASAPORTE de la persona es correcto", "success");
        }
    }
    if(tdocumento == "CARNET"){
        if(numero.length != 12){
            return swal("CARNET DE EXTRANJERIA debe tener 12 dígitos","El campo CARNET EXTRANJERIA debe contener 12 digitos","warning");
        }else {
            swal("CARNET DE EXTRANJERIA es Correcto", "El CARNET DE EXTRANJERIA de la persona es correcto", "success");
        }
    }
    
}


