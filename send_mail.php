<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    $subject = "New Form Submission";
    $message = "
        <h2>Form Submission Details</h2>
        <p><strong>First Name:</strong> $firstname</p>
        <p><strong>Last Name:</strong> $lastname</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
    ";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thirumurugan1042@gmail.com';
        $mail->Password = 'jgbm llue ibkm cywr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->setFrom('thirumurugan1042@gmail.com', 'Thirumurugan');
        $mail->addAddress('thiru10042002@gmail.com', 'Murugan');
    
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
    
        $mail->send();
        echo "Message has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}    
?>
