function ValidarDatos() {
    var id_empresa = document.getElementById("txt_id_empresa").value;
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
        document.getElementById("txt_id_empresa").style.background = 'lightgreen';
        document.getElementById("txt_id_empresa").focus();
        return false;
    } else if (nombre_empresa == null || nombre_empresa.length === 0 || /^\s+$/.test(nombre_empresa)) {
        alert("Debes escribir el nombre de la empresa");
        document.getElementById("txt_nombre_empresa").style.background = 'lightgreen';
        document.getElementById("txt_nombre_empresa").focus();
        return false;
    }   else if (numero == null || numero.length === 0 || isNaN(numero)) {
        alert("Debes ingresar un numero de telefono válido");
        document.getElementById("txt_telefono_empresa").style.background = 'lightgreen';
        document.getElementById("txt_telefono_empresa").focus();
        return false;
    } else if (sitio_web == null || sitio_web.length === 0 || /^\s+$/.test(sitio_web)) {
        alert("Debes escribir el sitio web de la empresa");
        document.getElementById("txt_sitio_web").style.background = 'lightgreen';
        document.getElementById("txt_sitio_web").focus();
        return false;
    } else if (oficinas_c == null || oficinas_c == 0 || oficinas_c.length === 0 || /^\s+$/.test(oficinas_c)) {
        alert("Debes ingresar el estado");
        document.getElementById("txt_oficinas_c").style.background = 'lightgreen';
        document.getElementById("txt_oficinas_c").focus();
        return false;
    } else if (email == null || email.length === 0 || /^\s+$/.test(email)) {
        alert("Debes escribir el email de la empresa");
        document.getElementById("txt_email_empresa").style.background = 'lightgreen';
        document.getElementById("txt_email_empresa").focus();
        return false;
    } else if (direccion == null || direccion.length === 0 || /^\s+$/.test(direccion)) {
        alert("Debes escribir la dirección de la empresa");
        document.getElementById("txt_direccion_empresa").style.background = 'lightgreen';
        document.getElementById("txt_direccion_empresa").focus();
        return false;
    } else if (ciudad == null || ciudad.length === 0 || /^\s+$/.test(ciudad)) {
        alert("Debes escribir la ciudad de la empresa");
        document.getElementById("txt_ciudad_empresa").style.background = 'lightgreen';
        document.getElementById("txt_ciudad_empresa").focus();
        return false;
    } else if (cp == null || cp.length === 0 || isNaN(cp)) {
        alert("Debes ingresar un código postal válido");
        document.getElementById("txt_cp").style.background = 'lightgreen';
        document.getElementById("txt_cp").focus();
        return false;
    }

    return true;
}
