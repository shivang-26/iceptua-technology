<?php 
$page_title = "Home";
require_once 'includes/functions.php';
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="hero-section-dark">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="hero-content">
          <h1 class="hero-title">
            <span class="text-lime">We do IT</span>
            <span class="text-white">right.</span>
          </h1>
          <p class="hero-subtitle">Iceptua Technologies, IT Consultants</p>
          <a href="contact.php" class="btn btn-lime btn-lg">
            Book a Call
          </a>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="hero-graphic">
          <div class="geometric-islands">
            <!-- Development Cube -->
            <div class="shape cube development-shape">
              <div class="face front">
                <i class="bi bi-code-slash"></i>
              </div>
              <div class="face back">
                <i class="bi bi-code-slash"></i>
              </div>
              <div class="face right">
                <i class="bi bi-code-slash"></i>
              </div>
              <div class="face left">
                <i class="bi bi-code-slash"></i>
              </div>
              <div class="face top">
                <i class="bi bi-code-slash"></i>
              </div>
              <div class="face bottom">
                <i class="bi bi-code-slash"></i>
              </div>
            </div>
            
            <!-- Infrastructure Pyramid -->
            <div class="shape pyramid infrastructure-shape">
              <div class="pyramid-face front">
                <i class="bi bi-cloud"></i>
              </div>
              <div class="pyramid-face back">
                <i class="bi bi-cloud"></i>
              </div>
              <div class="pyramid-face left">
                <i class="bi bi-cloud"></i>
              </div>
              <div class="pyramid-face right">
                <i class="bi bi-cloud"></i>
              </div>
            </div>
            
            <!-- Training Sphere -->
            <div class="shape sphere training-shape">
              <div class="sphere-content">
                <i class="bi bi-mortarboard"></i>
              </div>
            </div>
            
            <!-- Connection Lines -->
            <div class="connection-lines">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
            </div>
            
            <!-- Floating Particles -->
            <div class="particles">
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
              <div class="particle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-indicator">
    <div class="scroll-dot"></div>
  </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">Our Services</h2>
    <div class="row g-4">
      <?php 
        $categories = [
          [
            'name' => 'Development',
            'icon' => 'fas fa-code',
            'subtitle' => 'Custom Web & App Solutions',
            'description' => 'We build secure, scalable web and mobile apps using modern tech like React, Node.js, and Python—tailored to your business needs.',
            'link' => 'services.php#development',
            'color' => 'primary'
          ],
          [
            'name' => 'Infrastructure',
            'icon' => 'fas fa-server',
            'subtitle' => 'Cloud & IT Support',
            'description' => 'Robust AWS, Azure, and hybrid cloud solutions with DevOps automation and 24/7 IT support for reliable, cost-efficient systems.',
            'link' => 'services.php#infrastructure--support',
            'color' => 'primary'
          ],
          [
            'name' => 'Training',
            'icon' => 'fas fa-graduation-cap',
            'subtitle' => 'Full-Stack & IT Training',
            'description' => 'Industry-recognized training in Full-Stack Development, Cloud, Network, Cybersecurity, and AI/ML with hands-on, real-world projects.',
            'link' => 'services.php#training',
            'color' => 'primary'
          ]
        ];
        
        foreach ($categories as $i => $category) {
      ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>" data-aos-duration="800">
        <div class="card card-service h-100">
          <div class="card-body text-center p-4">
            <h4 class="card-title fw-bold mb-3"><?= htmlspecialchars($category['name']) ?></h4>
            <h6 class="card-subtitle mb-3 text-primary"><?= htmlspecialchars($category['subtitle']) ?></h6>
            <p class="card-text mb-4 text-muted"><?= htmlspecialchars($category['description']) ?></p>
            <div class="mt-auto">
              <a href="<?= $category['link'] ?>" class="btn btn-primary px-4 py-2" data-aos="fade-up" data-aos-delay="<?= $i * 100 + 200 ?>">
                <i class="fas fa-arrow-right me-2"></i>Learn More
            </a>
          </div>
        </div>
      </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Training Highlight -->
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title">Training & Certifications</h2>
    <div class="row justify-content-center mb-4">
      <div class="col-lg-8 text-center" data-aos="fade-up">
        <p class="lead text-muted">Boost your career or team with our industry-recognized training programs. All courses are led by certified experts and include hands-on learning.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php 
        $training_courses = load_json('training.json');
        // Get first 3 courses
        $featured_courses = array_slice($training_courses, 0, 3);
        
        foreach ($featured_courses as $i => $course) { 
      ?>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
        <div class="training-card h-100 p-4">
          <h5 class="fw-bold mb-3"><?= htmlspecialchars($course['title']) ?></h5>
          <div class="d-flex gap-4 text-muted mb-3">
            <div><i class="far fa-clock me-1"></i> <?= htmlspecialchars($course['duration']) ?></div>
            <div><i class="fas fa-laptop me-1"></i> <?= htmlspecialchars($course['mode']) ?></div>
          </div>
          <?php if ($course['certificate']): ?>
          <div>
            <span class="badge bg-success">
              <i class="bi bi-check-circle me-1"></i>Certificate Included
            </span>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="text-center mt-4" data-aos="fade-up">
      <a href="training.php" class="btn btn-outline-primary btn-lg">
        <i class="bi bi-arrow-right me-2"></i>View All Training
      </a>
    </div>
  </div>
</section>

<!-- Our Clients -->
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title text-center mb-5">Our Clients</h2>
    <div class="row justify-content-center align-items-center">
      <div class="col-6 col-md-4 col-lg-3 mb-4">
        <div class="client-logo d-flex justify-content-center align-items-center p-4" style="height: 120px;">
          <img src="https://prodcd.isb.edu/media/5zdd3j2s/isb_identity_colour_rgb_positive.svg" alt="Indian School of Business" class="img-fluid" style="height: 50px; width: auto; object-fit: contain;">
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 mb-4">
        <div class="client-logo d-flex justify-content-center align-items-center p-4" style="height: 120px;">
          <img src="https://cmsredesign.channeli.in/library/assets/images/iitrLogo.png" alt="IIT Roorkee" class="img-fluid" style="height: 50px; width: auto; object-fit: contain;">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact CTA -->
<section class="py-5" style="background: var(--gradient-primary);">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
        <h2 class="text-white mb-3">Ready to Transform Your Business?</h2>
        <p class="text-white-50 mb-4">Let's discuss how our services can help you achieve your goals. Get in touch with us today!</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <a href="contact.php" class="btn btn-light btn-lg">
            <i class="bi bi-envelope me-2"></i>Contact Us
          </a>
          <a href="services.php" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-right me-2"></i>Explore Services
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?> 
