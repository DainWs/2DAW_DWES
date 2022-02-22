<?php

namespace exam\src\libraries\phpmailer;

use exam\src\models\Usuarios;

/**
 * This class is the message that will be sended
 */
class EmailMessage {
    private Usuarios $destination;
    private String $subject;
    private Array $bodyData;

    /**
     * In the constructor we prepare the configuration for PHPMailer
     */
    public function __construct(Usuarios $destination, Array $data = []) {
        $this->destination = $destination;
        $this->subject = 'Factura de Chinos Paco';
        $this->bodyData = $data;
    }

    public function getDestination(): Usuarios {
        return $this->destination;
    }

    public function getSubject(): String {
        return $this->subject;
    }

    public function setBody(Array $data): void {
        $this->bodyData = $data;
    }

    public function getBody() {
        $DATA = $this->bodyData;
        ob_start();
        include('public/libs/phpmailer/EmailHTMLBody.php');
        $body = ob_get_clean();
        ob_flush();

        return $body;
    }
}