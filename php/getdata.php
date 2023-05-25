<?php
include('db_config.php');
include('../email/enviar.php');
$Codigo = "REC-2013-0001";

$Nombres = $_POST["Nombres"];
$Primer_apellido = $_POST["Primer_apellido"];
$Segundo_apellido = $_POST["Segundo_apellido"];
$tipo_documento = $_POST["tipo_documento"];
$numero_doc = $_POST["numero_doc"];
$Departamento = $_POST["Departamento"];
$Provincia = $_POST["Provincia"];
$Distrito = $_POST["Distrito"];
$Direccion = $_POST["Dirección"];
$Correo = $_POST["Correo"];
$Telefono = $_POST["Telefono"];


$Referencia = $_POST["Referencia"];
$Tipo_reclamo = $_POST["Tipo_reclamo"];


$TipoConsumo = $_POST["Servicio"];
$N_Comprobante = $_POST["N_Comprobante"];

$Proveedor = "Emaran S.A.C";


$Monto = $_POST["Monto"];
$Detalle = $_POST["Detalle"];
$Nombre_producto = $_POST["Nombre_producto"];

$Nlote = $_POST["Nlote"];

$Fecha_caducidad = $_POST["Fecha_caducidad"];
$cantidad = $_POST["Cantidad"];
$Descripcion = $_POST["Descripcion"];

$Fecha_compra = $_POST["Fecha_compra"];
$Fecha_consumo = $_POST["Fecha_consumo"];

$Pedido_cliente = $_POST["Pedido_cliente"];

/*
    echo "Codigo: " . $Codigo . "<br>";
    echo "Nombres: " . $Nombres . "<br>";
    echo "Primer_apellido: " . $Primer_apellido . "<br>";
    echo "Segundo_apellido: " . $Segundo_apellido . "<br>";
    echo "tipo_documento: " . $tipo_documento . "<br>";
    echo "numero_doc: " . $numero_doc . "<br>";
    echo "Departamento: " . $Departamento . "<br>";
    echo "Provincia: " . $Provincia . "<br>";
    echo "Distrito: " . $Distrito . "<br>";
    echo "Dirección: " . $Dirección . "<br>";
    echo "Correo: " . $Correo . "<br>";
    echo "Telefono: " . $Telefono . "<br>";
    echo "Referencia: " . $Referencia . "<br>";
    echo "Tipo_reclamo: " . $Tipo_reclamo . "<br>";
    echo "TipoConsumo: " . $TipoConsumo . "<br>";

    echo "N_Comprobante: " . $N_Comprobante . "<br>";
    //fehca reclamo
    echo "Proveedor: " . "Emaran SAC" . "<br>";

    echo "Monto: " . $Monto . "<br>";
    echo "Detalle: " . $Detalle . "<br>";
    echo "nombre_producto: " . $Nombre_producto . "<br>";
    echo "Nlote: " . $Nlote . "<br>";
    echo "Fecha_caducidad: " . $Fecha_caducidad . "<br>";

    echo "Descripcion: " . $Descripcion . "<br>";
    echo "Fecha_compra: " . $Fecha_compra . "<br>";
    echo "Fecha_consumo: " . $Fecha_consumo . "<br>";

    echo "Pedido_cliente: " . $Pedido_cliente . "<br>";

*/
function formatoFecha($fecha)
{
    $timestamp = strtotime($fecha);
    $fechaFormato = date('Y/m/d', $timestamp);
    return $fechaFormato;
}

function fechaGuionesABarras($fecha)
{
    $fechaBarras = str_replace('-', '/', $fecha);
    return formatoFecha($fechaBarras);
}

$fecha_actual = date('Y/m/d');
//$fecha_actual = formatoFecha($fecha_actual);


echo $Fecha_caducidad . "<br>";

// $f_Fecha_caducidad = strtotime($Fecha_caducidad);
// $f_Fecha_caducidad = date('Y-m-d', $f_Fecha_caducidad);

// echo $f_Fecha_caducidad . "<br>";

$query = "INSERT INTO usuariosreclamos (
Codigo,
Nombres,
PrimerApellido,
SegundoApellido,
TipoDocumento,
NumDocumento,
Departamento,
Provincia,
Distrito,
Direccion,
Correo,
Telefono,
Referencia,
TipoReclamo, 
TipoConsumo, 
NumComprovante,
FechaReclamo,
Proveedor,
Monto, DetalleReclamo, NombreProducto, NLote, FechaCaducidad, DescripcionProSer, FechaCompra,
FechaConsumo, PedidoCliente,cantidad)
VALUES(
 '$Codigo',
'$Nombres',
'$Primer_apellido',
'$Segundo_apellido',
'$tipo_documento',
'$numero_doc',
'$Departamento',
'$Provincia',
'$Distrito',
'$Direccion',
'$Correo',
'$Telefono',
'$Referencia',
'$Tipo_reclamo',
'$TipoConsumo',
'$N_Comprobante',
'$fecha_actual',
'$Proveedor',
'$Monto',
'$Detalle',
'$Nombre_producto',
'$Nlote',
'$Fecha_caducidad',
'$Descripcion',
'$Fecha_compra',
'$Fecha_consumo',
'$Pedido_cliente',$cantidad)";
mysqli_query($con, $query);

$correoDestino = $Correo; 
	//'sistemas.emaransac@gmail.com';
$nombreDestino = $Nombres;
$rutaArchivoAdjunto = 'archivo.pdf';


if(EnviarCorreo($correoDestino, $nombreDestino,$Tipo_reclamo,$Codigo)){
    echo 'Correo enviado correctamente.';
} else {
    echo 'Ha ocurrido un error al enviar el correo.';
}

// Redirige al usuario a una página de confirmación
header("Location: confirmacion.html");
exit();
//echo "DATOS ENVIADOS" . "<br>";

//$query = "INSERT INTO usuariosreclamos (file_name, upload_time)VALUES('" . $fileName . "','" . date("Y-m-d") . "')";
