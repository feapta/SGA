<?php 
// Envio de mail

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

        // Crear el objeto de mail
        $mail = new PHPMailer(true);
        
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();                                 
            $mail->Host = 'smtp.ionos.es';                   
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sistemar.es';           
            $mail->Password = 'infosistemar120314@';             
            $mail->SMTPSecure = 'tls';                       
            $mail->Port = 587;                               
                    
        
            $mail->setFrom('info@sistemar.es');                       // Remitente
            $mail->addAddress( $this->email, 'Sistemar');          // Destinatario
            $mail->Subject = 'Tiene un nuevo correo';

            // Usamos html para el cuerpo del mensaje
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> has creado tu cuenta en Sistemar, solo debe confirmarla presionando en el siguiente enlace: </p>";
            $contenido .= "<p>Presione aqui: <a href='http://sistemar.es/confirmar?token=" . $this->token . "'>Confirmar cuenta</a>";
            $contenido .= "<p>Si no solicito esta cuenta, puede ignorar el mensaje </p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();
           
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }

    }

    public function enviarInstrucciones(){
        $mail = new PHPMailer(true);
        
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();
            $mail->Host = 'smtp.ionos.es';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sistemar.es';
            $mail->Password = 'infosistemar120314@';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
                    
        
            $mail->setFrom('info@sistemar.es');                       // Remitente
            $mail->addAddress( $this->email, 'Sistemar');             // Destinatario
            $mail->Subject = 'Instrucciones restablecer password';

            // Usamos html para el cuerpo del mensaje
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer el password, sigue el siguiente enlace: </p>";
            $contenido .= "<p>Presione aqui: <a href='http://sistemar.es/usuarios/recuperar?token=" . $this->token . "'>Restablecer</a>";
            $contenido .= "<p>Si no solicito esta cuenta, puede ignorar el mensaje </p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();
           
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }


    }

}

?>