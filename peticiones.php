<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];
    $clave = $_REQUEST['clave'];
    $fecha = $_REQUEST['fecha'];
    $roll = $_REQUEST['roll'];
    $depto = $_REQUEST['depto'];
    $formapago = isset($_REQUEST['formapago']) ? implode("/", $_REQUEST['formapago']) : "";
    $accion = $_REQUEST['accion'];

    if ($accion === "insertar") {
        $sql = "INSERT INTO usuarios ('id', 'nombre', 'email', 'clave', 'fecha', 'roll', 'depto', 'formapago') 
                VALUES ('$id', '$nombre', '$email', '$clave', '$fecha', '$roll', '$depto', '$formapago')";
    } elseif ($accion === "actualizar") {
        $sql = "UPDATE usuarios 
                SET nombre='$nombre', email='$email', clave='$clave', fecha='$fecha', 
                    roll='$roll', depto='$depto', formapago='$formapago' 
                WHERE id=$id";
    } elseif ($accion === "eliminar") {
        $sql = "";
    } 
    elseif ($accion === "select") {
        $sql = "INSERT INTO usuarios ('id', 'nombre', 'email', 'clave', 'fecha', 'roll', 'depto', 'formapago') 
                VALUES ('$id', '$nombre', '$email', '$clave', '$fecha', '$roll', '$depto', '$formapago')";
        echo str_repeat($sql . "<br>", 10);
    } 
    else {
        $sql = "Acción no válida.";
    }

    echo $sql;
    exit; // evita que también se muestre el HTML
}
?>

    <article style ="display: block;" >
    <h3>Ejercicio 7</h3>
    <h1>Peticiones fetch (API)</h1>
    <hr>
    <P>El ejercicio consiste en solicitar informacion a traves de un formulario 
        HTML, posteriormente procesar los datos con PHP con el arreglo $_REQUEST[] 
    </P>
    <p>El proceso se solicitara realizando peticiones fetch usando el metodo POST.</p>
    <p>Para cada sentencia SQL (INSERT, UPDATE Y DELETE) se realizara a traves de 
        un boton HTML</p>
    <p>Desplegar las sentencias INSERT, UPDATE Y DELETE segun corresponda del
        boton accionado.
    </p>
    <p>La sentencia SQL debera estar formada con los datos proporcionados por 
        el formulario HTML
    </p>
    <hr>
    <form id="frm" onsubmit="return false;">
        <label>ID:</label>
        <input type="text" name="id"><br>

        <label>Nombre:</label>
        <input type="text" name="nombre"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Clave para tu usuario:</label>
        <input type="password" name="clave"><br>

        <label>Fecha de creacion:</label>
        <input type="date" name="fecha"><br>

        <label>ROLL:</label><br>
        <input type="radio" name="roll" value="Admin"> Admin
        <input type="radio" name="roll" value="Proveedor"> Proveedor
        <input type="radio" name="roll" value="Cliente"> Cliente<br>

        <label>Departamento:</label>
        <select name="depto">
            <option value="001">Ventas</option>
            <option value="002">Recursos Humanos</option>
            <option value="003">Sistemas</option>
        </select>
        
        
            <label>Formas de pago del Cliente:</label>        
            <input type="checkbox" name="formapago[]" value="Efectivo"> Efectivo
            <input type="checkbox" name="formapago[]" value="Transferencia Electronica"> Transferencia Electronica
            <input type="checkbox" name="formapago[]" value="Tarjeta de Credito"> Tarjeta de Crédito
            <input type="checkbox" name="formapago[]" value="Criptomoneda"> Criptomoneda
        
        <label for=""></label>
        <input type="hidden" name="accion" id="accion">

        <button onclick="enviar('insertar')">INSERTAR</button>
        <button onclick="enviar('actualizar')">UPDATE</button>
        <button onclick="enviar('eliminar')">ELIMINAR</button>
        <button onclick="enviar('select')">SELECT</button>

    </form>

    <h4>Sentencia SQL</h4>
    <div id="resultado" style="white-space: pre-wrap;"></div>
    </article>