function boolean_validation() {

    if (document.getElementById("mod_contrato").value == "Sí") {
        document.getElementById("mod_val").disabled = false;
    }
    else if (document.getElementById("mod_contrato").value == "No") {
        document.getElementById("mod_val").disabled = true;
    }
    if (document.getElementById("mod_contrato").value == "No") {
        document.getElementById("mod_val").disabled = true;
    }

}

function ComboboxEdad() {
    select = document.getElementById("edades_combobox");
    for (i = 1; i <= 100; i++) {
        option = document.createElement("option");
        option.value = i;
        option.text = i;
        select.appendChild(option);
    }
}


function Firma() {

    if (document.getElementById('checkFirma').checked) {
        document.getElementById("btnFirma").disabled = false;
    } else {
        document.getElementById("btnFirma").disabled = true;
    }
}

function calcular() {
    var valorInicial = document.getElementById('ini_val').value,
        valorAdicional = document.getElementById('mod_val').value;
    var valorModificado = parseFloat(valorInicial) + parseFloat(valorAdicional);
    if (document.getElementById('mod_val').getAttribute('disabled') != null) {
        document.getElementById('act_val').value = parseInt(valorInicial);
    } else {
        try {
            document.getElementById('act_val').value = parseInt(valorModificado);
        } catch (e) { }
    };

}


