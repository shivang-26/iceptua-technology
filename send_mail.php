<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'message' => 'Invalid request.']);
  exit;
}
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

// Basic validation
if (!$name || !$email || !$phone || !$message) {
  echo json_encode(['success' => false, 'message' => 'All fields are required.']);
  exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
  exit;
}
if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
  echo json_encode(['success' => false, 'message' => 'Invalid phone number.']);
  exit;
}

// Send email using PHPMailer
require_once __DIR__.'/includes/functions.php';
$mail = get_mailer();
$mail->addAddress('contact@buildwithshivang.site', 'Iceptua'); // Change to your company email
$mail->Subject = 'New Contact Form Submission - Iceptua Website';
$mail->isHTML(true);

// Create HTML email body
$htmlBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .header { background-color: #1A73E8; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #1A73E8; }
        .message { background-color: #f5f5f5; padding: 15px; border-left: 4px solid #1A73E8; }
    </style>
</head>
<body>
    <div class='header'>
        <h2>New Contact Form Submission</h2>
        <p>Iceptua Website</p>
    </div>
    <div class='content'>
        <div class='field'>
            <span class='label'>Name:</span> $name
        </div>
        <div class='field'>
            <span class='label'>Email:</span> <a href='mailto:$email'>$email</a>
        </div>
        <div class='field'>
            <span class='label'>Phone:</span> <a href='tel:$phone'>$phone</a>
        </div>
        <div class='field'>
            <span class='label'>Message:</span>
            <div class='message'>" . nl2br(htmlspecialchars($message)) . "</div>
        </div>
    </div>
</body>
</html>";

$mail->Body = $htmlBody;

if ($mail->send()) {
  echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent.']);
} else {
  echo json_encode(['success' => false, 'message' => 'Failed to send message. Please try again later.']);
} 