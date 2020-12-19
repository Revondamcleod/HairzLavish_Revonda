<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = 'C3132FE9EC3FEDA9DFC2DDF3D66A2CBAC6A0D32B3BD6AF6A28CF341857A35831E33451F440B2CA3B6E36604B918E9302';
            $url = 'https://api.elasticemail.com/v2/email/send';

              // $email = new \SendGrid\Mail\Mail();
            // $email->setFrom("nahum_kelly@yahoo.com", "Nahum Kelly");
            // $email->setSubject($subject);
            // $email->addTo($to);
            // $email->addContent("text/plain", $content);
            // //$email->addContent("text/html", $content);

            try {

                $email = array('from' => 'revondamcleodacca@gmail.com',
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
