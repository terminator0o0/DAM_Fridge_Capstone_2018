<?php
require '../3rd-party/PHPMailer/PHPMailerAutoload.php';

    try 
        {
            $db = new PDO(
            'mysql:host=127.0.0.1;dbname=damfridge',
            'admin',
            '');
        } 
        catch (Exception $e) 
        {
            echo "Error connecting to database: " .$e->getMessage();
        }
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    $sql_e = "SELECT * FROM users WHERE Email='$email'";
    $row = $db->prepare($sql_e);
    $row->execute();
    $result = $row->fetch(PDO::FETCH_ASSOC);

    $mail = new PHPMailer();
      
      //Enable SMTP debugging.
      $mail->SMTPDebug = 1;
      //Set PHPMailer to use SMTP.
      $mail->isSMTP();
      //Set SMTP host name
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
      //Set this to true if SMTP host requires authentication to send email
      $mail->SMTPAuth = TRUE;
      //Provide username and password
      $mail->Username = "damfridge@gmail.com";
      $mail->Password = "Damf2018";
      //If SMTP requires TLS encryption then set it
      $mail->SMTPSecure = "false";
      $mail->Port = 587;
      //Set TCP port to connect to
      
      $mail->From = "anasyaseen1@hotmail.com";
      $mail->FromName = "DAMfridge";
      
      $mail->addAddress($result["Email"]);
      
      $mail->isHTML(true);
     
      $mail->Subject = "Your Password";
      $mail->Body = "<i>Your Password is: </i>".$result["Password"];
      $mail->AltBody = "This is the plain text version of the email content";
      if(!$mail->send())
      {
       echo "Mailer Error: " . $mail->ErrorInfo;
      }
      else
      {
       echo "Email has been sent successfully";
       header("Location: ../index.html");
      }
  ?>