function ValidaFormulario1() {
   
    var envioId = document.getElementById("txt_envio_id").value;
    var paqueteria = document.getElementById("combo_departamento").value;
    var fechaEnvio = document.getElementById("f_envio").value;
    var destino = document.getElementById("destino").value;
    var ciudadDestino = document.getElementById("ciudad_destino").value;
    var estado = document.getElementById("estado").value;
    var costo = document.getElementById("costo").value;
    var remitente = document.getElementById("n_remitente").value;
    var destinatario = document.getElementById("n_destinatario").value;
    var peso = document.getElementById("peso").value;

   
    if (envioId == null || envioId.length === 0 || /^\s+$/.test(envioId)) {
        alert("ID de Envío es obligatorio");
        document.getElementById("txt_envio_id").style.background = 'lightcoral';
        document.getElementById("txt_envio_id").focus();
        return false;
    } else if (paqueteria == "0") {
        alert("Debes seleccionar una empresa de paquetería");
        document.getElementById("combo_departamento").style.background = 'lightcoral';
        document.getElementById("combo_departamento").focus();
        return false;
    } else if (fechaEnvio == null || fechaEnvio.length === 0 || /^\s+$/.test(fechaEnvio)) {
        alert("La fecha de envío es obligatoria");
        document.getElementById("f_envio").style.background = 'lightcoral';
        document.getElementById("f_envio").focus();
        return false;
    } else if (destino == null || destino.length === 0 || /^\s+$/.test(destino)) {
        alert("Debes ingresar un destino válido");
        document.getElementById("destino").style.background = 'lightcoral';
        document.getElementById("destino").focus();
        return false;
    } else if (ciudadDestino == null || ciudadDestino.length === 0 || /^\s+$/.test(ciudadDestino)) {
        alert("Debes ingresar la ciudad de destino");
        document.getElementById("ciudad_destino").style.background = 'lightcoral';
        document.getElementById("ciudad_destino").focus();
        return false;
    } else if (estado == null || estado == "" || estado == 0 || /^\s+$/.test(estado)) {
        alert("Debes seleccionar un estado");
        document.getElementById("estado").style.background = 'lightcoral';
        document.getElementById("estado").focus();
        return false;
    } else if (costo == null || costo.length === 0 || isNaN(costo)) {
        alert("Debes ingresar un costo válido");
        document.getElementById("costo").style.background = 'lightcoral';
        document.getElementById("costo").focus();
        return false;
    } else if (remitente == null || remitente.length === 0 || /^\s+$/.test(remitente)) {
        alert("Debes ingresar el nombre del remitente");
        document.getElementById("n_remitente").style.background = 'lightcoral';
        document.getElementById("n_remitente").focus();
        return false;
    } else if (destinatario == null || destinatario.length === 0 || /^\s+$/.test(destinatario)) {
        alert("Debes ingresar el nombre del destinatario");
        document.getElementById("n_destinatario").style.background = 'lightcoral';
        document.getElementById("n_destinatario").focus();
        return false;
    } else if (peso == null || peso.length === 0 || isNaN(peso)) {
        alert("Debes ingresar un peso válido");
        document.getElementById("peso").style.background = 'lightcoral';
        document.getElementById("peso").focus();
        return false;
    }

    return true;
}
