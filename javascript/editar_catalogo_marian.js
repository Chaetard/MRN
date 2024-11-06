function ValidaFormulario1() {
    var id_empresa = document.getElementById("txt_id_empresas").value;
    var nombre_empresa = document.getElementById("txt_nombre_empresa").value;
    var numero = document.getElementById("txt_telefono_empresa").value;
    var sitio_web = document.getElementById("txt_sitio_web").value;
    var oficinas_c = document.getElementById("txt_oficinas_c").value;
    var email = document.getElementById("txt_email_empresa").value;
    var direccion = document.getElementById("txt_direccion_empresa").value;
    var ciudad = document.getElementById("txt_ciudad_empresa").value;
    var cp = document.getElementById("txt_cp").value;
  
 



    if (id_empresa == null || id_empresa.length === 0 || /^\s+$/.test(id_empresa)) {
        alert("Debes escribir la CLAVE de la factura usando solo números");
        document.getElementById("txt_id_empresa").value = "";
        document.getElementById("txt_id_empresa").style.background = 'lightgreen';
        document.getElementById("txt_id_empresa").focus();
        return false;
    } else if (nombre_empresa == null || nombre_empresa.length === 0 || /^\s+$/.test(nombre_empresa)) {
        alert("Debes escribir el nombre de la empresa");
        document.getElementById("txt_nombre_empresa").style.background = 'lightgreen';
        document.getElementById("txt_nombre_empresa").focus();
        return false;
    } else if (fecha_emision == null || fecha_emision.length === 0) {
        alert("Debes seleccionar la fecha de emisión");
        document.getElementById("txt_fecha_emision").style.background = 'lightgreen';
        document.getElementById("txt_fecha_emision").focus();
        return false;
    } else if (fecha_vencimiento == null || fecha_vencimiento.length === 0) {
        alert("Debes seleccionar la fecha de vencimiento");
        document.getElementById("txt_fecha_vencimiento").style.background = 'lightgreen';
        document.getElementById("txt_fecha_vencimiento").focus();
        return false;
    } else if (cp == null || cp.length === 0 || isNaN(cp)) {
        alert("Debes ingresar un monto total válido");
        document.getElementById("txt_cp").style.background = 'lightgreen';
        document.getElementById("txt_cp").focus();
        return false;
    } else if (lugar_emision == null || lugar_emision.length === 0 || /^\s+$/.test(lugar_emision)) {
        alert("Debes ingresar el lugar de emisión");
        document.getElementById("txt_lugar_emision").style.background = 'lightgreen';
        document.getElementById("txt_lugar_emision").focus();
        return false;
    } else if (oficinas_c == null || oficinas_c == 0 || oficinas_c.length === 0 || /^\s+$/.test(oficinas_c)) {
        alert("Debes ingresar el estado de pago");
        document.getElementById("txt_oficinas_c").style.background = 'lightgreen';
        document.getElementById("txt_oficinas_c").focus();
        return false;
    }

    return true;
}