<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '66A4AAC8F29C0657F7E1DD256E658AD5C636D019AAC65F3A3E32E4F3AB6777E5432829E0EDEB84C18A917D37D0EB4280';
            $url = 'https://api.elasticemail.com/v2/email/send';

              // $email = new \SendGrid\Mail\Mail();
            // $email->setFrom("nahum_kelly@yahoo.com", "Nahum Kelly");
            // $email->setSubject($subject);
            // $email->addTo($to);
            // $email->addContent("text/plain", $content);
            // //$email->addContent("text/html", $content);

            try {

                $email = array('from' => 'nahumkelly73@gmail.com',
                'fromName' => 'IT Conference',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                //echo $result;

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>