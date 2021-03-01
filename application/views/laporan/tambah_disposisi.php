<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Tambah Disposisi</h1>
  <div class="row">
   <div class="col-lg">
    <div class="card">
      <div class="card-body">
        <form action="<?= site_url('laporan/simdis') ?>" method="post">

          <div class="row mb-3">
            <label for="tgl_disposisi" class="col-sm-2 col-form-label">Tanggal Disposisi</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tgl_disposisi" name="tgl_disposisi">
              <?= form_error('tgl_disposisi','<small class="text-danger pl-3">', '</small>');  ?>
            </div>
          </div>

          <div class="row mb-3">
            <input type="hidden" class="form-control" id="id_suratmasuk" name="id_suratmasuk" value="<?= $nomor_surat['id_suratmasuk']; ?>">
            <?= form_error('id_suratmasuk','<small class="text-danger pl-3">', '</small>');  ?>
          </div>

          <div class="row mb-3">
            <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan Tujuan Disposisi" value="<?= $nomor_surat['nomor_surat']; ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan perihal" value="<?= $nomor_surat['perihal']; ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="tujuan" class="col-sm-2 col-form-label">Tujuan Disposisi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan Disposisi">
            </div>
          </div>

          <div class="row mb-3">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan">
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
