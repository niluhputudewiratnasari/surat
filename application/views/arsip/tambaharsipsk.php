<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Tambah Arsip Surat Keluar</h1>
  <div class="row">
   <div class="col-lg">
    <div class="card">
      <div class="card-body">
        <form action="<?= site_url('arsip/proses_simpansk') ?>" method="post">
         <div class="row mb-3">
          <input type="hidden" class="form-control" id="id_suratkeluar" name="id_suratkeluar" value="<?= $nomor_surat['id_suratkeluar']; ?>">
          <?= form_error('id_suratkeluar','<small class="text-danger pl-3">', '</small>');  ?>

        </div>
        <div class="row mb-3">
          <label for="tgl_arsipkeluar" class="col-sm-2 col-form-label">Tanggal Arsip Keluar</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" required id="tgl_arsipkeluar" name="tgl_arsipkeluar">
            <?= form_error('tgl_arsipkeluar','<small class="text-danger pl-3">', '</small>');  ?>
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
          <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kepada" name="kepada" value="<?= $nomor_surat['kepada']; ?>" readonly>
          </div>
        </div> <div class="row mb-3">
          <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tgl_surat" name="tgl_surat"  value="<?= $nomor_surat['tgl_surat']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="<?=site_url('Surat/suratkeluar')?>" role="button">Batal</a>
          </div>
        </div>

      </div>
    </div>


  </div>

</div>        

</div>
</div>
