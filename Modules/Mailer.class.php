<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Mailer{
    public function __construct($host,$port){
        $this->mail = new PHPMailer(true);                                                              
        $this->mail->isSMTP();                                      
        $this->mail->Host = $host; 
        $this->mail->Port = $port;  
        $this->mail->SMTPAuth = true; 

    }    
    public function authenticate($user,$pass)
    {                          
        $this->mail->Username = $user;                 
        $this->mail->Password = $pass;                           
        $this->mail->SMTPSecure = 'ssl';  
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );        
    }
                                          
           
    public function to($to,$name){
        $this->mail->setFrom($this->mail->Username,"support@sstechindia.com");
        $this->mail->addAddress($to, $name);    
            
        }
           

    public function message($subject,$html)
    {
        $this->mail->isHTML(true);                                  
        $this->mail->Subject = $subject;
        $this->mail->Body    = $html;
    }
    public function send()
    {
        try{
            $this->mail->send();
            
        }
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
                        
}