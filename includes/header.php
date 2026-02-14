<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Iceptua - Development, Infrastructure & Training</title>
  <meta name="description" content="Iceptua provides Development, Infrastructure & Support, and Training with Certification.">
  <meta name="keywords" content="Development, Infrastructure, Support, Training, Certification, IT, Cloud, DevOps">
  <meta name="author" content="Iceptua">
  <!-- Open Graph -->
  <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Iceptua">
  <meta property="og:description" content="Iceptua provides Development, Infrastructure & Support, and Training with Certification.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.iceptua.com/">
  <meta property="og:image" content="/assets/images/og-image.jpg">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/assets/images/favicon.png">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <!-- AOS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/assets/images/clogo.png" alt="Iceptua Logo" height="40" style="max-width: 250px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="/">
              <i class="bi bi-house me-1"></i>Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="/about.php">
              <i class="bi bi-info-circle me-1"></i>About
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" href="/services.php">
              <i class="bi bi-gear me-1"></i>Services
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'training.php' ? 'active' : ''; ?>" href="/training.php">
              <i class="bi bi-mortarboard me-1"></i>Training
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="/contact.php">
              <i class="bi bi-envelope me-1"></i>Contact
            </a>
          </li>
        </ul>
        <div class="social-icons ms-3 d-none d-lg-block">
          <a href="https://www.linkedin.com/company/iceptua-technology/" title="LinkedIn" class="me-2"><i class="bi bi-linkedin"></i></a>
          <!-- <a href="#" title="Twitter" class="me-2"><i class="bi bi-twitter"></i></a> -->
        </div>
      </div>
    </div>
  </nav>
  <div style="padding-top: 80px;"></div>
  <!-- Page content starts here --> 