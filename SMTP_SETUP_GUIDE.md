# SMTP Setup Guide for Iceptua Website

## 🚀 **Step 1: Download PHPMailer**

1. **Download PHPMailer from GitHub:**
   - Go to: https://github.com/PHPMailer/PHPMailer
   - Click "Code" → "Download ZIP"
   - Extract the ZIP file

2. **Copy required files to your project:**
   - Copy these files from the extracted folder to your `PHPMailer/` directory:
     - `src/PHPMailer.php` → `PHPMailer/PHPMailer.php`
     - `src/SMTP.php` → `PHPMailer/SMTP.php`
     - `src/Exception.php` → `PHPMailer/Exception.php`

## 🔧 **Step 2: Configure SMTP Settings**

### **For GoDaddy Hosting:**

1. **Edit `includes/functions.php`:**
   ```php
   $mail->Host = 'smtpout.secureserver.net'; // GoDaddy's SMTP server
   $mail->Username = 'your-email@yourdomain.com'; // Your GoDaddy email
   $mail->Password = 'your-email-password'; // Your email password
   ```

2. **Edit `send_mail.php`:**
   ```php
   $mail->addAddress('info@iceptua.com', 'Iceptua'); // Your company email
   ```

### **Alternative SMTP Settings:**

**For Gmail:**
```php
$mail->Host = 'smtp.gmail.com';
$mail->Username = 'your-gmail@gmail.com';
$mail->Password = 'your-app-password'; // Use App Password, not regular password
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
```

**For Outlook/Hotmail:**
```php
$mail->Host = 'smtp-mail.outlook.com';
$mail->Username = 'your-email@outlook.com';
$mail->Password = 'your-password';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
```

## 📧 **Step 3: Email Configuration**

### **Required Changes:**

1. **In `includes/functions.php`:**
   - Replace `your-email@yourdomain.com` with your actual email
   - Replace `your-email-password` with your actual password

2. **In `send_mail.php`:**
   - Replace `info@iceptua.com` with your company's email address

## 🔐 **Step 4: Security Considerations**

### **For Gmail Users:**
1. Enable 2-Factor Authentication
2. Generate an "App Password"
3. Use the App Password instead of your regular password

### **For GoDaddy Users:**
1. Use your cPanel email credentials
2. Make sure your email is properly set up in cPanel

## 🧪 **Step 5: Testing**

1. **Upload files to GoDaddy**
2. **Test the contact form**
3. **Check your email inbox**

## ⚠️ **Troubleshooting**

### **Common Issues:**

1. **"SMTP connect() failed"**
   - Check your email/password
   - Verify SMTP settings
   - Try different ports (465, 587)

2. **"Authentication failed"**
   - Double-check username/password
   - For Gmail: Use App Password
   - For GoDaddy: Use cPanel email credentials

3. **"Connection timeout"**
   - Check firewall settings
   - Try different SMTP servers
   - Contact hosting provider

### **Debug Mode:**
Add this to `includes/functions.php` for debugging:
```php
$mail->SMTPDebug = 2; // Enable debug output
```

## 📋 **Final Checklist**

- [ ] PHPMailer files uploaded to `PHPMailer/` directory
- [ ] SMTP settings updated in `includes/functions.php`
- [ ] Company email updated in `send_mail.php`
- [ ] Test contact form submission
- [ ] Check email delivery
- [ ] Remove debug mode (if enabled)

## 🎯 **Ready to Deploy!**

Once configured, your contact form will send professional HTML emails to your company email address whenever someone submits the form. 