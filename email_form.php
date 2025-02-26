<?php
/**
 * SMTP Email Sender
 *
 * This script allows users to send emails via SMTP using PHPMailer.
 * It provides a form for entering SMTP credentials, recipient email,
 * subject, and message content, with error handling and UI enhancements.
 *
 * @author    RMC Software Solutions (@sinhalaya)
 * @license   Open-source
 * @copyright RMC Software Solutions 2021 - 2025
 */

// Include PHPMailer classes
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $smtp_host   = $_POST['smtp_host'];
    $smtp_port   = $_POST['smtp_port'];
    $smtp_user   = $_POST['smtp_user'];
    $smtp_pass   = $_POST['smtp_pass'];
    $smtp_secure = $_POST['smtp_secure']; // SSL or TLS
    $from_email  = $_POST['from_email'];
    $to_email    = $_POST['to_email'];
    $subject     = $_POST['subject'];
    $body        = $_POST['body'];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_user;
        $mail->Password   = $smtp_pass;
        $mail->SMTPSecure = $smtp_secure;
        $mail->Port       = $smtp_port;

        // Sender & Recipient
        $mail->setFrom($from_email, 'Sender');
        $mail->addAddress($to_email);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($body);
        $mail->AltBody = strip_tags($body);

        // Send Email
        if ($mail->send()) {
            $message = "<div class='success'>✅ Email sent successfully!</div>";
        }
    } catch (Exception $e) {
        $message = "<div class='error'>❌ Email could not be sent. Error: {$mail->ErrorInfo}</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTP Email Sender</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #28a745;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #218838;
        }
        .success, .error {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 16px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Send Email via SMTP</h2>

        <?php echo $message; ?>

        <form method="post">
            <div class="form-group">
                <label>SMTP Host:</label>
                <input type="text" name="smtp_host" value="mail.example.com" required>
            </div>

            <div class="form-group">
                <label>SMTP Port:</label>
                <input type="number" name="smtp_port" value="587" required>
            </div>

            <div class="form-group">
                <label>SMTP Username:</label>
                <input type="text" name="smtp_user" value="name@example.com" required>
            </div>

            <div class="form-group">
                <label>SMTP Password:</label>
                <input type="password" name="smtp_pass" value="Abc@123" required>
            </div>

            <div class="form-group">
                <label>Encryption (SSL/TLS):</label>
                <select name="smtp_secure">
                    <option value="tls" selected>TLS</option>
                    <option value="ssl">SSL</option>
                </select>
            </div>

            <div class="form-group">
                <label>From Email:</label>
                <input type="email" name="from_email" value="name@example.com" required>
            </div>

            <div class="form-group">
                <label>Recipient Email:</label>
                <input type="email" name="to_email" required>
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" required>
            </div>

            <div class="form-group">
                <label>Message:</label>
                <textarea name="body" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn">Send Email</button>
        </form>
    </div>

</body>
</html>
