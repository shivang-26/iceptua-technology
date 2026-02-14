<?php 
$page_title = "Contact";
include 'includes/header.php'; 
?>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-5">Contact Us</h2>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
          <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
              <div class="icon-shape icon-shape-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(13, 110, 253, 0.1);">
                <i class="bi bi-envelope text-primary" style="font-size: 1.75rem;"></i>
              </div>
              <h3 class="fw-bold mb-1">Send us a Message</h3>
              <p class="text-muted">We'll get back to you as soon as possible</p>
            </div>
          <form id="contactForm">
            <div class="mb-4">
              <label for="name" class="form-label fw-medium">Full Name</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-2" id="name" name="name" placeholder="Enter your full name" required>
              </div>
            </div>
            
            <div class="mb-4">
              <label for="email" class="form-label fw-medium">Email Address</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                <input type="email" class="form-control border-start-0 ps-2" id="email" name="email" placeholder="Enter your email address" required>
              </div>
            </div>
            
            <div class="mb-4">
              <label for="phone" class="form-label fw-medium">Phone Number</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone text-muted"></i></span>
                <input type="tel" class="form-control border-start-0 ps-2" id="phone" name="phone" pattern="^[0-9]{10,15}$" maxlength="15" placeholder="Enter your phone number" required>
              </div>
              <div class="form-text text-muted small mt-1">We'll only use this to contact you about your inquiry</div>
              <div class="invalid-feedback">Please enter a valid 10-15 digit phone number</div>
            </div>
            
            <div class="mb-4">
              <label for="message" class="form-label fw-medium">Your Message</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-light border-end-0 align-items-start pt-3"><i class="bi bi-chat-text text-muted"></i></span>
                <textarea class="form-control border-start-0 ps-2" id="message" name="message" rows="4" required placeholder="Tell us about your project or inquiry..."></textarea>
              </div>
            </div>
            
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                <i class="bi bi-send-fill me-2"></i>Send Message
              </button>
            </div>
            <div id="formAlert" class="mt-4"></div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Client-side phone validation
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function() {
  this.value = this.value.replace(/[^0-9]/g, '');
});

// AJAX form submission
const contactForm = document.getElementById('contactForm');
contactForm.addEventListener('submit', function(e) {
  e.preventDefault();
  
  if (!contactForm.checkValidity()) {
    contactForm.classList.add('was-validated');
    return;
  }
  
  const submitBtn = contactForm.querySelector('button[type="submit"]');
  const originalText = submitBtn.innerHTML;
  submitBtn.innerHTML = '<span class="loading me-2"></span>Sending...';
  submitBtn.disabled = true;
  
  const formData = new FormData(contactForm);
  
  fetch('send_mail.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    const alertDiv = document.getElementById('formAlert');
    if (data.success) {
      alertDiv.innerHTML = '<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>' + data.message + '</div>';
      contactForm.reset();
      contactForm.classList.remove('was-validated');
    } else {
      alertDiv.innerHTML = '<div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>' + data.message + '</div>';
    }
  })
  .catch(() => {
    document.getElementById('formAlert').innerHTML = '<div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>An error occurred. Please try again later.</div>';
  })
  .finally(() => {
    submitBtn.innerHTML = originalText;
    submitBtn.disabled = false;
  });
});
</script>

<?php include 'includes/footer.php'; ?> 