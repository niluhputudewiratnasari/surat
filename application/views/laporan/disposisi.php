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

        <table id="example1" class="table table-striped mt-3">
         <thead>
          <tr>
            <th>No</th>
            <th>Id Disposisi</th>
            <th>Tanggal Disposisi</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Tujuan Disposisi</th>
            <th>Isi Disposisi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($nomor_surat as $dis) : ?>
           <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $dis['id_disposisi']; ?></td>
            <td><?= $dis['tgl_disposisi']; ?></td>
            <td><?= $dis['nomor_surat']; ?></td>
            <td><?= $dis['perihal']; ?></td>
            <td><?= $dis['tujuan']; ?></td>
            <td><?= $dis['keterangan']; ?></td>

            <td>           
              <a href="<?= base_url(); ?>laporan/editdis/<?= $dis['id_disposisi'];?>" class="badge badge-success">Edit</a>
              <a href="<?= base_url(); ?>laporan/hapusdis/<?= $dis['id_disposisi'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
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