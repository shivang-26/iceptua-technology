<?php include 'includes/header.php'; ?>
<?php include_once 'includes/functions.php'; ?>

<section class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title text-center mb-2">Training & Certifications</h2>
    <div class="row justify-content-center">
      <div class="col-12 text-center px-4">
        <p class="lead mb-1">Boost your career or team with our industry-recognized training programs. All courses are led by certified experts and include hands-on learning.</p>
        
        <!-- Search Bar -->
        <div class="search-container">
          <div class="container px-0">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                  <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Search courses...">
                </div>
              </div>
              <div class="col-md-3">
                <select class="form-select" id="categoryFilter">
                  <option value="">All Categories</option>
                  <option value="programming">Programming</option>
                  <option value="networking">Networking</option>
                  <option value="security">Security</option>
                  <option value="cloud">Cloud</option>
                  <option value="marketing">Marketing</option>
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-select" id="sortBy">
                  <option value="title">Sort by: Title (A-Z)</option>
                  <option value="duration">Sort by: Duration (Shortest First)</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <p id="resultCount" class="text-muted mb-4"></p>
      </div>
    </div>
    <div class="row">
      <?php 
        $training = load_json('training.json');
        foreach ($training as $course) { ?>
        <?php 
            // Define course categories based on title and content
            $title = strtolower($course['title']);
            $description = strtolower($course['description']);
            $category = 'other';
            
            if (strpos($title, 'python') !== false || strpos($description, 'python') !== false || 
                strpos($title, 'full stack') !== false || strpos($description, 'development') !== false) {
                $category = 'programming';
            } elseif (strpos($title, 'ccna') !== false || strpos($title, 'ccnp') !== false || 
                     strpos($title, 'cisco') !== false || strpos($description, 'network') !== false) {
                $category = 'networking';
            } elseif (strpos($title, 'security') !== false || strpos($description, 'security') !== false || 
                     strpos($title, 'cyber') !== false || strpos($description, 'cyber') !== false) {
                $category = 'security';
            } elseif (strpos($title, 'azure') !== false || strpos($description, 'cloud') !== false || 
                     strpos($title, 'aws') !== false) {
                $category = 'cloud';
            } elseif (strpos($title, 'marketing') !== false || strpos($description, 'seo') !== false || 
                     strpos($description, 'sem') !== false || strpos($description, 'social media') !== false) {
                $category = 'marketing';
            }
        ?>
        <div class="col-md-4 mb-4 course-card" 
             data-category="<?= $category ?>" 
             data-duration="<?= strtolower($course['duration']) ?>" 
             data-title="<?= htmlspecialchars(strtolower($course['title'])) ?>">
          <div class="card h-100">
            <div class="card-body d-flex flex-column">
              <div class="flex-grow-1">
                <h5 class="fw-bold text-primary mb-3"><?= htmlspecialchars($course['title']) ?></h5>
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                  <span class="text-muted small"><i class="bi bi-clock me-1"></i> <?= htmlspecialchars($course['duration']) ?></span>
                  <span class="text-muted small"><i class="bi bi-laptop me-1"></i> <?= htmlspecialchars($course['mode']) ?></span>
                  <?php if (!empty($course['certificate'])): ?>
                    <span class="badge bg-success"><i class="bi bi-award me-1"></i> Certificate</span>
                  <?php endif; ?>
                </div>
                <?php if (!empty($course['description'])): ?>
                  <p class="text-muted small mb-0 course-description"><?= htmlspecialchars($course['description']) ?></p>
                <?php endif; ?>
              </div>
              <div class="mt-auto">
                <a href="contact.php?course=<?= urlencode($course['title']) ?>" class="btn btn-outline-primary w-100">
                  Enroll Now <i class="bi bi-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-md-8 text-center">
        <h4 class="mb-4">Sample Certificate</h4>
        <div class="certificate-container">
          <img src="assets/images/Sample-Certificate.png" alt="Sample Certificate" class="img-fluid rounded shadow">
        </div>
        <p class="mt-3 text-muted">This is a sample of the professional certificate you'll receive upon course completion.</p>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Training Page Specific JS -->
<script src="assets/js/training.js"></script>