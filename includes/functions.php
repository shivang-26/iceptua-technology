<?php
// Utility function to load JSON data from /data/
function load_json($filename) {
    $path = __DIR__ . '/../data/' . $filename;
    if (file_exists($path)) {
        $json = file_get_contents($path);
        return json_decode($json, true);
    }
    return [];
}

// PHPMailer configuration for GoDaddy hosting
function get_mailer() {
    require_once __DIR__ . '/../PHPMailer/PHPMailer.php';
    require_once __DIR__ . '/../PHPMailer/SMTP.php';
    require_once __DIR__ . '/../PHPMailer/Exception.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    
    // GoDaddy SMTP Settings
    $mail->Host = 'mail.buildwithshivang.site'; // GoDaddy's SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@buildwithshivang.site'; // Replace with your email
    $mail->Password = 'Shivang2022##'; // Replace with your email password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    // Set sender information
    $mail->setFrom('contact@buildwithshivang.site', 'Contact Form');
    
    return $mail;
} 