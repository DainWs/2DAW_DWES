<?php

namespace exam\src\libraries\phpmailer;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * This class manage the send email task
 */
class EmailManager {
    private const SMTP_HOST = 'smtp.gmail.com';
    private const SMTP_PORT = 465;
    private const SMTP_AUTH = true;
    private const SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_SMTPS;
    
    private PHPMailer $mailer;

    /**
     * In the constructor we prepare the configuration for PHPMailer
     */
    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = SELF::SMTP_HOST;
        $this->mailer->Port = SELF::SMTP_PORT;
        $this->mailer->SMTPAuth = SELF::SMTP_AUTH;
        $this->mailer->SMTPSecure = SELF::SMTP_ENCRYPTION;

        $this->mailer->Username = $_SERVER['PHPMAILER_USER_EMAIL'];
        $this->mailer->Password = $_SERVER['PHPMAILER_USER_PASSWORD'];
        
        $this->mailer->setFrom($_SERVER['PHPMAILER_USER_EMAIL'], $_SERVER['PHPMAILER_USER_NAME']);
    }

    /**
     * Send a email to user
     * @param EmailMessage $message the message that is wanted to send via email
     */
    public function send(EmailMessage $message): bool  {
        $result = true;
        try {
            $destination = $message->getDestination();
            $this->mailer->addAddress($destination->email, $destination->nombre);
            $this->mailer->Subject = $message->getSubject();
            $this->mailer->isHTML(true);
            $this->mailer->Body = $message->getBody();
            $result = $this->mailer->send();
        } catch(Exception $ex) {
            $result = false;
        }
        return $result;
    }
}