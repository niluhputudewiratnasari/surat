   <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <!-- untuk card pada bagian my profile(controller akun) -->
          <img src="<?= base_url('assets/img/profile/') . $akun['image']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $akun['name']; ?></h5>
            <p class="card-text"><?= $akun['email']; ?></p>
            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $akun['date_create']); ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>