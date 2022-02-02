<?php

namespace src\libraries;

use Exception;
use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;
use src\models\Pedidos;

/**
 * This class manage the send email task
 */
class EmailManager {
    private const SMTP_HOST = 'smtp.gmail.com';
    private const SMTP_PORT = 465;
    private const SMTP_AUTH = true;
    private const SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_SMTPS;
    private const USER_NAME = 'Chinos Paco';
    private const USER_EMAIL = 'chinospac453@gmail.com';
    private const USER_PASSWORD = 'C41n0sP4c0';
    
    private LogManager $logger;
    private PHPMailer $mailer;

    /**
     * In the constructor we prepare the configuration for PHPMailer
     */
    public function __construct() {
        $this->logger = new LogManager('EmailManager');
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = SELF::SMTP_HOST;
        $this->mailer->Port = SELF::SMTP_PORT;
        $this->mailer->SMTPAuth = SELF::SMTP_AUTH;
        $this->mailer->SMTPSecure = SELF::SMTP_ENCRYPTION;

        $this->mailer->Username = SELF::USER_EMAIL;
        $this->mailer->Password = SELF::USER_PASSWORD;

        $this->mailer->setFrom(SELF::USER_EMAIL, SELF::USER_NAME);
    }

    /**
     * Send a email to the user specified by the pedido
     * @param $pedido the pedido that is wanted to send via email
     */
    public function send(Pedidos $pedido): void  {
        try {
            $cliente = $pedido->getUsuario();
            $this->logger->log("Send email to $cliente->email for her buy request.");
            $this->mailer->addAddress($cliente->email, $cliente->nombre);
            $this->mailer->Subject = 'Factura de Chinos Paco';

            $body = "Hi Mr/s $cliente->nombre $cliente->apellidos,<br/>" .
                    "Enviamos este correo para informarle que ha comprado los siguientes productos:<br/>" .
                    "<table style=\"border: 2px solid black; border-collapse: collapse;\">" . 
                        "<tr>" . 
                            "<th style=\"border: 2px solid black;\">Nombre</th>" . 
                            "<th style=\"border: 2px solid black;\">Descripci&oacute;n</th>" . 
                            "<th style=\"border: 2px solid black;\">Unidades</th>" .
                            "<th style=\"border: 2px solid black;\">Precio Total</th>" .
                        "</tr>";
            
            foreach ($pedido->getLineas() as $linea) {
                $product = $linea->getProducto();
                $totalProductPrice = ($product->precio - ($product->precio * ($product->oferta/100))) * $linea->unidades;

                $row = "<tr>";
                $row .= "<td style=\"border: 2px solid black;\">$product->nombre</td>";
                $row .= "<td style=\"border: 2px solid black;\">$product->descripcion</td>";
                $row .= "<td style=\"border: 2px solid black;\">$linea->unidades</td>";
                $row .= "<td style=\"border: 2px solid black;\">$totalProductPrice &euro;</td>";
                $row .= "</tr>";

                $body .= $row;
            }

            $fecha = $pedido->fecha->format(DATE_FORMAT);
            $hora = $pedido->hora->format(TIME_FORMAT);

            $body .= "<tr><th style=\"text-align: right;\" colspan=\"4\">Precio Total: ".$pedido->calcCoste()." &euro;</th></tr></table><br/>";
            $body .= "Este pedido se realizo el $fecha a las $hora. <br/>";
            $body .= "El pedido se enviar&aacute; a: $pedido->provincia, $pedido->localidad, $pedido->direccion<br/><br/>";
            $body .= "Tenga un buen dia, <br/>Firmado: Chinos Paco.";
            $this->mailer->isHTML(true);
            $this->mailer->Body = $body;
            $this->mailer->send();
        } catch(Exception $ex) {
            $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
        }
    }
}