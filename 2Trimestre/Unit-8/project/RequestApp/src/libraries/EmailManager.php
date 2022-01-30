<?php

namespace src\libraries;


use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use src\models\Pedidos;

class EmailManager {
    private const USER_NAME = 'Chinos Paco';
    private const USER_EMAIL = 'chinospac453@gmail.com';
    private const USER_PASSWORD = 'C41n0sP4c0';
    
    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = SELF::USER_EMAIL;
        $this->mailer->Password = SELF::USER_PASSWORD;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mailer->Port = 465;

        $this->mailer->setFrom(SELF::USER_EMAIL, SELF::USER_NAME);
    }

    public function send(Pedidos $pedido)  {
        try {
            $cliente = $pedido->getUsuario();
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
                $row .= "<td style=\"border: 2px solid black;\">$totalProductPrice €</td>";
                $row .= "</tr>";

                $body .= $row;
            }

            $fecha = $pedido->fecha->format(DATE_FORMAT);
            $hora = $pedido->hora->format(TIME_FORMAT);

            $body .= "<tr><th style=\"text-align: right;\" colspan=\"4\">Precio Total: ".$pedido->calcCoste()." €</th></tr></table><br/>";
            $body .= "Este pedido se realizo el $fecha a las $hora. <br/>";
            $body .= "El pedido se enviar&aacute; a: $pedido->provincia, $pedido->localidad, $pedido->direccion<br/><br/>";
            $body .= "Tenga un buen dia, <br/>Firmado: Chinos Paco.";
            $this->mailer->isHTML(true);
            $this->mailer->Body = $body;
            $this->mailer->send();
        } catch(Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
}