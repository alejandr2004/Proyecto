
/*Para hacer las validaciones he optado por utilizar "listeners". Estos elementos están a la espera de un "evento" que activará
el código que tienen asociado lo que se conoce como "callback" (tiene algo de similitud con los "triggers" de mysql, estos se activaban
antes o después de hacer cualquier modificación)*/


// document.addEventListener('DOMContentLoaded', () => {
  
// });










function validarTexto(inputId, errorId) {
    const input = document.getElementById(inputId);
    const errorText = document.getElementById(errorId);
    const value = input.value.trim();
    
    if (value === "") {
        errorText.innerHTML = "Este campo no puede estar vacío.";
    } else if (!isNaN(value)) {
        errorText.innerHTML = "Este campo no puede ser numérico.";
    } else {
        errorText.innerHTML = "";
    }
}

function validarTelefono(inputId, errorId) {
    const telefono = document.getElementById(inputId).value.trim();
    const errorTelefono = document.getElementById(errorId);

    if (telefono === "") {
        errorTelefono.innerHTML = "El campo no puede estar vacío.";
    } else if (!/^\d{9}$/.test(telefono)) {
        errorTelefono.innerHTML = "Debe contener 9 dígitos numéricos.";
    } else {
        errorTelefono.innerHTML = "";
    }
}

function validarEmail(inputId, errorId) {
    const email = document.getElementById(inputId).value.trim();
    const errorEmail = document.getElementById(errorId);
    let containsAt = false;

    for (let i = 0; i < email.length; i++) {
        if (email[i] === '@') {
            containsAt = true;
            break;
        }
    }

    if (email === "" || /^\s+$/.test(email)) {
        errorEmail.innerHTML = "El campo no puede estar vacío.";
    } else if (!containsAt) {
        errorEmail.innerHTML = "Formato incorrecto.";
    } else {
        errorEmail.innerHTML = "";
    }
}



function validarDNI(inputId, errorId) {
    const dni = document.getElementById(inputId).value.trim();
    const errorDNI = document.getElementById(errorId);

    
    const dniRegex = /^[0-9]{8}[A-Z]$/;

    if (dni === "" || /^\s+$/.test(dni)) {
        errorDNI.innerHTML = "El campo no puede estar vacío.";
    } else if (!dniRegex.test(dni)) {
        errorDNI.innerHTML = "Formato de DNI incorrecto.";
    } else {
        errorDNI.innerHTML = "";
    }
}

function validarNumero(inputId, errorId) {
    const input = document.getElementById(inputId);
    const errorText = document.getElementById(errorId);
    const value = input.value.trim();
    
    if (value === "") {
        errorText.innerHTML = "Este campo no puede estar vacío.";
    } else if (isNaN(value)) {
        errorText.innerHTML = "Este campo debe ser numérico.";
    } else {
        errorText.innerHTML = "";
    }
}

document.addEventListener('DOMContentLoaded', () => {
document.getElementById('DNI_3').addEventListener('input', () => validarDNI('DNI_3', 'error_DNI_3'));
document.getElementById('texto_17').addEventListener('input', () => validarTexto('texto_17', 'error_texto_17'));
document.getElementById('texto_18').addEventListener('input', () => validarTexto('texto_18', 'error_texto_18'));
document.getElementById('texto_19').addEventListener('input', () => validarTexto('texto_19', 'error_texto_19'));
document.getElementById('numero_6').addEventListener('input', () => validarNumero('numero_6', 'error_numero_6'));
document.getElementById('texto_1').addEventListener('input', () => validarTexto('texto_1', 'error_texto_1'));
document.getElementById('texto_2').addEventListener('input', () => validarTexto('texto_2', 'error_texto_2'));
document.getElementById('texto_3').addEventListener('input', () => validarTexto('texto_3', 'error_texto_3'));
document.getElementById('texto_4').addEventListener('input', () => validarTexto('texto_4', 'error_texto_4'));
document.getElementById('texto_5').addEventListener('input', () => validarTexto('texto_5', 'error_texto_5'));
document.getElementById('texto_6').addEventListener('input', () => validarTexto('texto_6', 'error_texto_6'));
document.getElementById('texto_7').addEventListener('input', () => validarTexto('texto_7', 'error_texto_7'));
document.getElementById('texto_8').addEventListener('input', () => validarTexto('texto_8', 'error_texto_8'));
document.getElementById('texto_9').addEventListener('input', () => validarTexto('texto_9', 'error_texto_9'));
document.getElementById('texto_10').addEventListener('input', () => validarTexto('texto_10', 'error_texto_10'));
document.getElementById('texto_11').addEventListener('input', () => validarTexto('texto_11', 'error_texto_11'));
document.getElementById('texto_12').addEventListener('input', () => validarTexto('texto_12', 'error_texto_12'));
document.getElementById('texto_13').addEventListener('input', () => validarTexto('texto_13', 'error_texto_13'));
document.getElementById('texto_14').addEventListener('input', () => validarTexto('texto_14', 'error_texto_14'));
document.getElementById('texto_15').addEventListener('input', () => validarTexto('texto_15', 'error_texto_15'));
document.getElementById('texto_16').addEventListener('input', () => validarTexto('texto_16', 'error_texto_16'));
document.getElementById('texto_17').addEventListener('input', () => validarTexto('texto_17', 'error_texto_17'));
document.getElementById('texto_18').addEventListener('input', () => validarTexto('texto_18', 'error_texto_18'));
document.getElementById('texto_19').addEventListener('input', () => validarTexto('texto_19', 'error_texto_19'));
document.getElementById('texto_20').addEventListener('input', () => validarTexto('texto_20', 'error_texto_20'));
document.getElementById('texto_21').addEventListener('input', () => validarTexto('texto_21', 'error_texto_21'));
document.getElementById('texto_22').addEventListener('input', () => validarTexto('texto_22', 'error_texto_22'));
document.getElementById('texto_23').addEventListener('input', () => validarTexto('texto_23', 'error_texto_23'));
document.getElementById('texto_24').addEventListener('input', () => validarTexto('texto_24', 'error_texto_24'));
document.getElementById('texto_25').addEventListener('input', () => validarTexto('texto_25', 'error_texto_25'));
document.getElementById('telefono_1').addEventListener('input', () => validarTelefono('telefono_1', 'error_telefono_1'));
document.getElementById('telefono_2').addEventListener('input', () => validarTelefono('telefono_2', 'error_telefono_2'));
document.getElementById('telefono_3').addEventListener('input', () => validarTelefono('telefono_3', 'error_telefono_3'));
document.getElementById('telefono_4').addEventListener('input', () => validarTelefono('telefono_4', 'error_telefono_4'));
document.getElementById('numero_1').addEventListener('input', () => validarNumero('numero_1', 'error_numero_1'));
document.getElementById('numero_2').addEventListener('input', () => validarNumero('numero_2', 'error_numero_2'));
document.getElementById('numero_3').addEventListener('input', () => validarNumero('numero_3', 'error_numero_3'));
document.getElementById('numero_4').addEventListener('input', () => validarNumero('numero_4', 'error_numero_4'));
document.getElementById('numero_5').addEventListener('input', () => validarNumero('numero_5', 'error_numero_5'));
document.getElementById('numero_6').addEventListener('input', () => validarNumero('numero_6', 'error_numero_6'));
document.getElementById('numero_7').addEventListener('input', () => validarNumero('numero_7', 'error_numero_7'));
document.getElementById('numero_8').addEventListener('input', () => validarNumero('numero_8', 'error_numero_8'));
document.getElementById('numero_9').addEventListener('input', () => validarNumero('numero_9', 'error_numero_9'));
document.getElementById('numero_10').addEventListener('input', () => validarNumero('numero_10', 'error_numero_10'));
document.getElementById('DNI_1').addEventListener('input', () => validarDNI('DNI_1', 'error_DNI_1'));
document.getElementById('DNI_2').addEventListener('input', () => validarDNI('DNI_2', 'error_DNI_2'));
document.getElementById('DNI_3').addEventListener('input', () => validarDNI('DNI_3', 'error_DNI_3'));
document.getElementById('email_1').addEventListener('input', () => validarEmail('email_1', 'error_email_1'));
document.getElementById('email_2').addEventListener('input', () => validarEmail('email_2', 'error_email_2'));
document.getElementById('email_3').addEventListener('input', () => validarEmail('email_3', 'error_email_3'));
document.getElementById('email_4').addEventListener('input', () => validarEmail('email_4', 'error_email_4'));
document.getElementById('email_5').addEventListener('input', () => validarEmail('email_5', 'error_email_5'));
document.getElementById('email_6').addEventListener('input', () => validarEmail('email_6', 'error_email_6'));
document.getElementById('email_7').addEventListener('input', () => validarEmail('email_7', 'error_email_7'));
document.getElementById('email_8').addEventListener('input', () => validarEmail('email_8', 'error_email_8'));
document.getElementById('email_9').addEventListener('input', () => validarEmail('email_9', 'error_email_9'));
document.getElementById('email_10').addEventListener('input', () => validarEmail('email_10', 'error_email_10'));

});














/*

function validarTexto(inputId, errorId) {
    const input = document.getElementById(inputId);
    const errorText = document.getElementById(errorId);
    const value = input.value.trim();
    
    if (value === "") {
        errorText.innerHTML = "Este campo no puede estar vacío.";
    } else if (!isNaN(value)) {
        errorText.innerHTML = "Este campo no puede ser numérico";
    } else {
        errorText.innerHTML = "";
    }
}



document.getElementById('texto_1').addEventListener('input', () => validarTexto('texto_1', 'error_texto_1'));
document.getElementById('texto_2').addEventListener('input', () => validarTexto('texto_2', 'error_texto_2'));
document.getElementById('texto_3').addEventListener('input', () => validarTexto('texto_3', 'error_texto_3'));
document.getElementById('texto_4').addEventListener('input', () => validarTexto('texto_4', 'error_texto_4'));
document.getElementById('texto_5').addEventListener('input', () => validarTexto('texto_5', 'error_texto_5'));
document.getElementById('texto_6').addEventListener('input', () => validarTexto('texto_6', 'error_texto_6'));
document.getElementById('texto_7').addEventListener('input', () => validarTexto('texto_7', 'error_texto_7'));
document.getElementById('texto_8').addEventListener('input', () => validarTexto('texto_8', 'error_texto_8'));
document.getElementById('texto_9').addEventListener('input', () => validarTexto('texto_9', 'error_texto_9'));
document.getElementById('texto_10').addEventListener('input', () => validarTexto('texto_10', 'error_texto_10'));
document.getElementById('texto_11').addEventListener('input', () => validarTexto('texto_11', 'error_texto_11'));
document.getElementById('texto_12').addEventListener('input', () => validarTexto('texto_12', 'error_texto_12'));
document.getElementById('texto_13').addEventListener('input', () => validarTexto('texto_13', 'error_texto_13'));
document.getElementById('texto_14').addEventListener('input', () => validarTexto('texto_14', 'error_texto_14'));
document.getElementById('texto_15').addEventListener('input', () => validarTexto('texto_15', 'error_texto_15'));
document.getElementById('texto_16').addEventListener('input', () => validarTexto('texto_16', 'error_texto_16'));
document.getElementById('texto_17').addEventListener('input', () => validarTexto('texto_17', 'error_texto_17'));
document.getElementById('texto_18').addEventListener('input', () => validarTexto('texto_18', 'error_texto_18'));
document.getElementById('texto_19').addEventListener('input', () => validarTexto('texto_19', 'error_texto_19'));
document.getElementById('texto_20').addEventListener('input', () => validarTexto('texto_20', 'error_texto_20'));
document.getElementById('texto_21').addEventListener('input', () => validarTexto('texto_21', 'error_texto_21'));
document.getElementById('texto_22').addEventListener('input', () => validarTexto('texto_22', 'error_texto_22'));
document.getElementById('texto_23').addEventListener('input', () => validarTexto('texto_23', 'error_texto_23'));
document.getElementById('texto_24').addEventListener('input', () => validarTexto('texto_24', 'error_texto_24'));
document.getElementById('texto_25').addEventListener('input', () => validarTexto('texto_25', 'error_texto_25'));


function validarNumero(inputId, errorId) {
    const input = document.getElementById(inputId);
    const errorText = document.getElementById(errorId);
    const value = input.value.trim();
    
    if (value === "") {
        errorText.innerHTML = "Este campo no puede estar vacío.";
    } else if (isNaN(value)) {
        errorText.innerHTML = "Este campo debe ser numérico.";
    } else {
        errorText.innerHTML = "";
    }
}

document.getElementById('numero_1').addEventListener('input', () => validarNumero('numero_1', 'error_numero_1'));
document.getElementById('numero_2').addEventListener('input', () => validarNumero('numero_2', 'error_numero_2'));
document.getElementById('numero_3').addEventListener('input', () => validarNumero('numero_3', 'error_numero_3'));
document.getElementById('numero_4').addEventListener('input', () => validarNumero('numero_4', 'error_numero_4'));
document.getElementById('numero_5').addEventListener('input', () => validarNumero('numero_5', 'error_numero_5'));
document.getElementById('numero_6').addEventListener('input', () => validarNumero('numero_6', 'error_numero_6'));
document.getElementById('numero_7').addEventListener('input', () => validarNumero('numero_7', 'error_numero_7'));
document.getElementById('numero_8').addEventListener('input', () => validarNumero('numero_8', 'error_numero_8'));
document.getElementById('numero_9').addEventListener('input', () => validarNumero('numero_9', 'error_numero_9'));
document.getElementById('numero_10').addEventListener('input', () => validarNumero('numero_10', 'error_numero_10'));




function validarEmail(inputId, errorId) {
    const email = document.getElementById(inputId).value.trim();
    const errorEmail = document.getElementById(errorId);

    if (email === "" || /^\s+$/.test(email)) {
        errorEmail.innerHTML = "El campo no puede estar vacío.";
    } else if (!/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email)) {
        errorEmail.innerHTML = "Formato incorrecto.";
    } else {
        errorEmail.innerHTML = "";
    }
}



document.getElementById('email_1').addEventListener('input', () => validarEmail('email_1', 'error_email_1'));
document.getElementById('email_2').addEventListener('input', () => validarEmail('email_2', 'error_email_2'));
document.getElementById('email_3').addEventListener('input', () => validarEmail('email_3', 'error_email_3'));
document.getElementById('email_4').addEventListener('input', () => validarEmail('email_4', 'error_email_4'));
document.getElementById('email_5').addEventListener('input', () => validarEmail('email_5', 'error_email_5'));
document.getElementById('email_6').addEventListener('input', () => validarEmail('email_6', 'error_email_6'));
document.getElementById('email_7').addEventListener('input', () => validarEmail('email_7', 'error_email_7'));
document.getElementById('email_8').addEventListener('input', () => validarEmail('email_8', 'error_email_8'));
document.getElementById('email_9').addEventListener('input', () => validarEmail('email_9', 'error_email_9'));
document.getElementById('email_10').addEventListener('input', () => validarEmail('email_10', 'error_email_10'));






function validarTelefono(inputId, errorId) {
    const telefono = document.getElementById(inputId).value.trim();
    const errorTelefono = document.getElementById(errorId);

    if (telefono === "" || telefono.length === 0) {
        errorTelefono.innerHTML = "El campo no puede estar vacío.";
    } else if (!(/^\d{9}$/.test(telefono))) {
        errorTelefono.innerHTML = "Debe contener 9 dígitos numéricos.";
    } else {
        errorTelefono.innerHTML = "";
    }
}

document.getElementById('telefono_1').addEventListener('input', () => validarTelefono('telefono_1', 'error_telefono_1'));
document.getElementById('telefono_2').addEventListener('input', () => validarTelefono('telefono_2', 'error_telefono_2'));
document.getElementById('telefono_3').addEventListener('input', () => validarTelefono('telefono_3', 'error_telefono_3'));
document.getElementById('telefono_4').addEventListener('input', () => validarTelefono('telefono_4', 'error_telefono_4'));



















/*

function validarTexto_2() {
    const input = document.getElementById('texto_2');
    const errorText = document.getElementById('error_texto_2');
    const value = input.value.trim();
    
    if (value === "") {
        errorText.innerHTML = "Este campo no puede estar vacío.";
        
    } else if (!isNaN(value)){
        errorText.innerHTML = "Este campo no puede ser numérico"
        
    }else {
        errorText.innerHTML = "";
    
    }
}


*/