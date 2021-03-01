<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Tambah Arsip Surat Masuk</h1>
  <div class="row">
   <div class="col-lg">
    <div class="card">
      <div class="card-body">
        <form action="<?= site_url('arsip/proses_simpan') ?>" method="post">
         <div class="row mb-3">
          <input type="hidden" class="form-control" id="id_suratmasuk" name="id_suratmasuk" value="<?= $nomor_surat['id_suratmasuk']; ?>">
          <?= form_error('id_suratmasuk','<small class="text-danger pl-3">', '</small>');  ?>

        </div>
        <div class="row mb-3">
          <label for="tgl_arsipmasuk" class="col-sm-2 col-form-label">Tanggal Arsip Masuk</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="tgl_arsipmasuk" name="tgl_arsipmasuk">
            <?= form_error('tgl_arsipmasuk','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $nomor_surat['nomor_surat']; ?>" readonly>
          </div>
        </div>

        <div class="row mb-3">
          <label for="perihal" class="col-sm-2 col-form-label">Perihal </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $nomor_surat['perihal']; ?>" readonly>
          </div>
        </div>

        <div class="row mb-3">
          <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $nomor_surat['pengirim']; ?>" readonly>
          </div>
        </div> <div class="row mb-3">
          <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $nomor_surat['tgl_surat']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="<?=site_url('Admin/role')?>" role="button">Cancel</a>
          </div>
        </div>

      </div>
    </div>


  </div>

</div>        

</div>
</div>
