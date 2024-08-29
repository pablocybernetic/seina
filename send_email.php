<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Adjust path if necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;                       // Enable verbose debug output
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host       = 'mail.jitamaniafrica.com';     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                   // Enable SMTP authentication
        $mail->Username   = 'support@jitamaniafrica.com';  // SMTP username
        $mail->Password   = '%.P$!p5~%!Vb';  // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                    // TCP port to connect to

        // Recipients
        $mail->setFrom('support@jitamaniafrica.com', 'Mailer');
        $mail->addAddress('gitaup08@gmail.com', 'Recipient');  // Add a recipient
        $mail->addReplyTo($email, $name);                         // Add reply-to address

        // Content
        $mail->isHTML(true);                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<html>
                            <body>
                                <h2>Contact Form Submission</h2>
                                <p><strong>Name:</strong> $name</p>
                                <p><strong>Email:</strong> $email</p>
                                <p><strong>Phone:</strong> $phone</p>
                                <p><strong>Subject:</strong> $subject</p>
                                <p><strong>Message:</strong> $message</p>
                            </body>
                          </html>";
        $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message";

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'error: ', $mail->ErrorInfo;
    }
} else {
    echo 'error';
}
?>
