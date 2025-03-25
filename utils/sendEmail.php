<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__. "/../vendor/autoload.php";

    class EmailService {
        private $mail;
    
        public function __construct() {
            $this->mail = new PHPMailer(true);
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.gmail.com';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $_ENV['EMAIL_USERNAME'];
            $this->mail->Password   = $_ENV['EMAIL_PASSOWRD'];
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port       = 587;
            $this->mail->setFrom($_ENV['EMAIL_USERNAME'], $_ENV['EMAIL_FROM']);
        }
    
        public function sendBookingEmail($email) {
            try {
                $this->mail->addAddress($email);
                $this->mail->Subject = 'Booking Confirmation';
                $this->mail->Body    = 'Your booking has been confirmed payment will be done at the gate entrance!';
                
                if ($this->mail->send()) {
                    echo 'Email sent successfully!';
                    return true;
                } else {
                    echo 'Failed to send email.';
                    return false;
                }
            } catch (Exception $e) {
                echo "Error: {$this->mail->ErrorInfo}";
                return false;
            }
        }
    }
    
    // Usage
   
    
?>