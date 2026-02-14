Iceptua Website Deployment & Editing Guide
=========================================

1. Uploading to GoDaddy cPanel
------------------------------
- Zip all files and folders (including data/, assets/, includes/, PHPMailer/, and all .php files).
- Log in to GoDaddy cPanel.
- Go to File Manager and navigate to /public_html/.
- Upload and extract the zip file here.

2. Editing Dynamic Content
--------------------------
- All dynamic content (services, training, testimonials, blogs) is stored in the /data/ folder as JSON files.
- To update content:
  1. Go to cPanel > File Manager > public_html/data/
  2. Click the JSON file you want to edit (e.g., services.json).
  3. Use the Edit function to add, remove, or change entries.
  4. Save changes. The website updates instantly.

3. PHPMailer Setup (Contact Form)
---------------------------------
- Open includes/functions.php and find the PHPMailer config section.
- Enter your GoDaddy email address and SMTP credentials.
- Save the file.
- The contact form will now send emails to your company inbox.

4. File Structure
-----------------
- /assets/      - CSS, JS, images
- /data/        - JSON files for dynamic content
- /includes/    - header.php, footer.php, functions.php
- /PHPMailer/   - PHPMailer library (no Composer needed)
- index.php     - Home page
- about.php     - About Us
- services.php  - Services
- training.php  - Training & Certifications
- contact.php   - Contact form
- blog.php      - Blog/Updates
- send_mail.php - AJAX handler for contact form

5. SSL
------
- Enable free SSL in GoDaddy cPanel (Security > SSL/TLS).

6. Permissions
--------------
- /data/ folder should be writable for editing via cPanel File Manager (default is usually fine).

7. Support
----------
- For help, contact your web developer or refer to GoDaddy support for cPanel basics. 