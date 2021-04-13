   <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-6">
        <?= $this->session->flashdata('message') ;?>
      </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <!-- untuk card pada bagian my profile(controller akun) -->
          <img src="<?= base_url('assets/img/profile/') . $akun['file']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nama : <?= $akun['name']; ?></h5>
            <h6 class="card-text mb-5">Email  : <?= $akun['email']; ?></h6>
            <p class="card-text text-right"><small class="text-mute">Member since <?= date('d F Y', $akun['date_create']); ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>