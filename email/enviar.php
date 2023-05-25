<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function EnviarCorreo($correoDestino, $nombreDestino,$Tipo,$codigo){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'mail.emaransac.com';
        $mail->SMTPAuth = true;
        $mail->Username = "admin@emaransac.com";
        $mail->Password = 'Aji.30111918';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;


        $mail->setFrom('sistemas@emaransac.com', 'Emaran SAC');
        //$mail->addAddress('sistemas.emaransac@gmail.com', 'Destinatario');
        $mail->addAddress($correoDestino, $nombreDestino);
        //$mail->addAddress('yhon.sanchez@ucsp.edu.pe', $nombreDestino);

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Libro de reclamaciones virtual ';
        $mail->Body    = 'Estimado/a '.$nombreDestino.'<br>'.'<br>'.'<br>'.'Agradecemos de antemano su paciencia y comprensión.'.'<br>'.'<br>'.$Tipo. '  código: '.$codigo.'<br>'.'<br>'.'<br>'.'Le saluda atentamente,'.'<br>'.'emaransac.com';
		
		
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
		/*
        //$rutaArchivoAdjunto = './archivo.pdf';
        $filename = '/home/yerson/Downloads/archivo.pdf';
        if (file_exists($filename)) {
            echo 'El archivo existe';
        } else {
            echo 'El archivo no existe';
        }

        if(!empty($filename)){
            $mail->addAttachment($filename);
        }
*/
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}

/*




CREATE TABLE `usuariosreclamos` (
 `id` INT PRIMARY KEY AUTO_INCREMENT,
  `Codigo` varchar(15) NOT NULL,
  `Nombres` varchar(15) NOT NULL,
  `PrimerApellido` varchar(15) NOT NULL,
  `SegundoApellido` varchar(15) NOT NULL,
  `TipoDocumento` varchar(8) NOT NULL,
  `NumDocumento` int(8) NOT NULL,
  `Departamento` varchar(15) NOT NULL,
  `Provincia` varchar(15) NOT NULL,
  `Distrito` varchar(15) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Referencia` varchar(20) NOT NULL,
  `TipoReclamo` varchar(10) NOT NULL,
  `TipoConsumo` varchar(10) NOT NULL,
  `NumComprovante` varchar(15) NOT NULL,
  `FechaReclamo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Proveedor` varchar(15) NOT NULL,
  `Monto` int(11) NOT NULL,
  `DetalleReclamo` varchar(500) NOT NULL,
  `NombreProducto` varchar(50) NOT NULL,
  `NLote` varchar(15) NOT NULL,
  `FechaCaducidad` varchar(10) NOT NULL,
  `DescripcionProSer` varchar(500) NOT NULL,
  `FechaCompra` varchar(10) NOT NULL,
  `FechaConsumo` varchar(10) NOT NULL,
  `PedidoCliente` varchar(500) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
)











INSERT INTO `usuariosreclamos` (`Codigo`, `Nombres`, `PrimerApellido`, `SegundoApellido`, `TipoDocumento`, `NumDocumento`, `Departamento`, `Provincia`, `Distrito`, `Direccion`, `Correo`, `Telefono`, `Referencia`, `TipoReclamo`, `TipoConsumo`, `NumComprovante`, `FechaReclamo`, `Proveedor`, `Monto`, `DetalleReclamo`, `NombreProducto`, `NLote`, `FechaCaducidad`, `DescripcionProSer`, `FechaCompra`, `FechaConsumo`, `PedidoCliente`, `cantidad`) VALUES
('REC-2013-0001', 'yhon yerson', 'sachez', 'yucra', 'DNI', 77392825, 'Arequipá', 'Arequipa', 'selva alegre', 'av.independcia s/n', 'cristian.ahuate@gmai', 917606393, 'independencia', 'Reclamo', 'Producto', '5757', '2023-05-16 05:00:00', 'Emaran S.A.C', 25, 'Este es mi texto de prueba para el campo de detalle según lo indicado por el cliente', 'canela molida', 'DGFF45', '16/05/2023', 'Esta es la descripsion del producto io servicio con numero de palabras', '28/04/2023', '28/04/2023', 'este es el pedido del cleinte', 5),
('REC-2013-0001', 'Erick', 'Lopez', 'Garcia', 'DNI', 56895423, 'Arequipá ', 'Arequipa', 'selva alegre', 'av.independcia s/n', 'yhon.sanchez@ucsp.ed', 917606393, 'independencia', 'Reclamo', 'Producto', '5166', '2023-05-16 05:00:00', 'Emaran S.A.C', 23, 'Texto de prueba para poder comprobar el corecto funcionamiento de nuestro sistema', 'cafe', 'DGFF45', '28/04/2023', 'Segundo texto de prueba es de al siguiente manera', '28/04/2023', '28/04/2023', 'este en el pedido del cliente no se que poner ', 5);







*/


?>