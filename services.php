<?php include 'includes/header.php'; ?>
<?php include_once 'includes/functions.php'; ?>

<section class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title text-center">Our Services</h2>
    <?php 
      $services = load_json('services.json');
      $categories = ['Development', 'Infrastructure & Support', 'Training'];
      foreach ($categories as $cat) {
        echo '<h4 class="mt-5 mb-3 text-primary">' . htmlspecialchars($cat) . '</h4><div class="row">';
        foreach ($services as $service) {
          if ($service['category'] === $cat) {
    ?>
      <div class="col-md-4 mb-4" data-aos="fade-up">
        <div class="card card-service h-100">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($service['title']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
          </div>
        </div>
      </div>
    <?php }} echo '</div>'; } ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?> 