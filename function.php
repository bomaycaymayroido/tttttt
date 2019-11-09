<?php require_once 'init.php' ;
    require_once './vendor/autoload.php';
    require_once 'config.php';

?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    function finUserByEmail($email){
  
        global $db;
        $stmt = $db->prepare("SELECT * FROM user WHERE email=?");
        $stmt->execute(array($email));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     function finUserById($id)
     {
         global $db;
         $stmt = $db->prepare("SELECT * FROM user WHERE id=?");
         $stmt->execute(array($id));
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }
     function creatPost($id,$content)
     {
         global $db;
         $stmt =$db->prepare("INSERT into post (content,id)values(?,?)");
         $stmt->execute(array($content,$id));
         return $db->lastInsertId();
     }
     function generateRandomString($length =10)
     {
         $charraters = '0123456789qwertyuiopasdfghjklzxcvbnm';
         $charratersLength = strlen($charraters);
         $randomString ='';
         for($i = 0 ; $i < $length ; $i++)
         {
            $randomString .= $charraters[rand(0,$charratersLength-1)];
         }
         return $randomString;
     }
     
     function sendEmail($to,$name,$subject,$code,$content)
     {
        global $email_from;
        global $email_name;
        global $email_password;
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $email_from;
        //Password to use for SMTP authentication
        $mail->Password = $email_password;
        //Set who the message is to be sent from
     
        $mail->setFrom($email_from,$email_name);
        //Set an alternative reply-to address
        
        $mail->addAddress($to, $name);
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML("Mã kích hoạt tài khaonr của bạn là : <a href = \"http://127.0.0.1:81/test_iclude/activate.php?code=$code\">http://127.0.0.1:81/test_iclude/activate.php?code=$code</a>");
        //Replace the plain text body with one created manually
        $mail->AltBody = $content;
        //Attach an image file
        
        //send the message, check for errors
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
        //Section 2: IMAP
        //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
        //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
        //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
        //be useful if you are trying to get this working on a non-Gmail IMAP server.
        function save_mail($mail)
        {
            //You can change 'Sent Mail' to any other folder or tag
            $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
            $imapStream = imap_open($path, $mail->Username, $mail->Password);
            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
            imap_close($imapStream);
            return $result;
        }

     }
     function activateUser($code )
     {
        $db=new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', '');
        $stmt = $db->prepare("SELECT * FROM user WHERE code=? AND status = ?");
        $stmt->execute(array($code,0));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && $user['code'] == $code)
        {
            $stmt = $db->prepare("UPDATE user Set code = ? , status = ? where id = ? ");
            $stmt->execute(array('',1,$user['id']));
            return true;
        }
        return false;
     }
?>