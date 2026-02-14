# How to Run Your Iceptua Website

## Option 1: XAMPP (Recommended for Windows)

1. **Download XAMPP:**
   - Go to https://www.apachefriends.org/download.html
   - Download XAMPP for Windows
   - Install it (run as Administrator if needed)

2. **Start XAMPP:**
   - Open XAMPP Control Panel
   - Start Apache and MySQL (if needed)
   - Click "Admin" next to Apache to open http://localhost

3. **Copy your website:**
   - Copy all files from this folder to `C:\xampp\htdocs\iceptua\`
   - Access your site at: http://localhost/iceptua/

## Option 2: Built-in PHP Server (if PHP is installed)

1. **Install PHP:**
   - Download from https://windows.php.net/download/
   - Add PHP to your system PATH
   - Or use XAMPP (includes PHP)

2. **Run the server:**
   ```bash
   php -S localhost:8000
   ```
   - Open http://localhost:8000 in your browser

## Option 3: Deploy to GoDaddy (Production)

1. **Zip all files** (including data/, assets/, includes/, and all .php files)
2. **Upload to GoDaddy cPanel:**
   - Log in to GoDaddy cPanel
   - Go to File Manager → public_html/
   - Upload and extract the zip file
3. **Configure PHPMailer:**
   - Edit `includes/functions.php` and `send_mail.php`
   - Add your GoDaddy email and SMTP credentials
4. **Edit content:**
   - Use cPanel File Manager to edit JSON files in `/data/` folder

## Testing the Website

- **Home page:** http://localhost/iceptua/ (or your domain)
- **About:** http://localhost/iceptua/about.php
- **Services:** http://localhost/iceptua/services.php
- **Training:** http://localhost/iceptua/training.php
- **Contact:** http://localhost/iceptua/contact.php
- **Blog:** http://localhost/iceptua/blog.php

## Notes

- All content is dynamic and loaded from JSON files in `/data/`
- Contact form requires PHPMailer configuration to work
- Placeholder images can be replaced via cPanel File Manager
- The site is mobile-responsive and SEO-optimized 