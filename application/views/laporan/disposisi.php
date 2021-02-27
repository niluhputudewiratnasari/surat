   <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
     <div class="col-lg">
       <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
      <?= $this->session->flashdata('message'); ?>

      <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
       <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
        aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-info" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form> -->


    <div class="card">
      <div class="card-body">

        <table class="table table-striped mt-3">
         <thead>
          <tr>
            <th>No</th>
            <th>Id Disposisi</th>
            <th>Tanggal Disposisi</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Tujuan Disposisi</th>
            <th>Isi Disposisi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($nomor_surat as $sms) : ?>
           <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?=$no++?></td>
            <td><?=$sms->no_urut; ?></td>
            <td><?=$sms->tgl_dispossms; ?></td>
            <td><?=$sms->nomor_surat; ?></td>
            <td><?=$sms->perihal; ?></td>
            <td><?=$sms->tujuan; ?></td>
            <td><?=$sms->keterangan; ?></td>

            <td>           
              <a class="btn btn-xs btn-warning" title="Edit" href="<?=site_url('Laporan/disposisi/'.$sms->id_disposisi); ?>">
              </a>
              |
              <a class ="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"  href="<?=site_url('Laporan/disposisi/'.$sms->id_disposisi); ?>">
              </a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>
<!-- /.card -->
</div>
</div>
</div>
</div>