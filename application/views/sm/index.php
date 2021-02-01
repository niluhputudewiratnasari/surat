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



      <a href="<?php echo base_url('sm/tambahData') ?>" class="btn btn-primary  mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Data Surat Masuk</a>

      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
          aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-info" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <table class="table table-striped">
        <thead>
          <tr>
           <th scope="col">#</th>
           <th scope="col">Nomor Surat</th>
           <th scope="col">Perihal</th>
           <th scope="col">Kode Klasifikasi</th>
           <th scope="col">Lampiran</th>
           <th scope="col">Pengirim</th>
           <th scope="col">Tanggal Surat</th>
           <th scope="col">Status</th>
           <th scope="col">File</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php $i = 1; foreach ($nomor_surat as $sms) : ?>
        <tr>
          <th> <?php echo $i++ ?></th>
          <td><?php echo $sms->nomor_surat ?></td>
          <td><?php echo $sms->perihal ?></td>
          <td><?php echo $sms->klasifikasi ?></td>
          <td><?php echo $sms->lampiran ?></td>
          <td><?php echo $sms->pengirim ?></td>
          <td><?php echo $sms->tgl_surat ?></td>
          <td><?php echo $sms->status ?></td>
          <td><img src="<?php echo base_url().'assets/photo/'.$sms->file ?>" width="75px"></td>
          <td>
            <a href="<?= base_url(); ?>sm/updateData/<?= $sms->id_suratmasuk?>" class="badge badge-success">Edit</a>
            <a href="<?= base_url(); ?>sm/deleteData/<?= $sms->id_suratmasuk?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
            <a href="" class="badge badge-warning">Arsipkan</a>
          </td>
        </tr>
      <?php endforeach; ?>   
    </tbody>
  </table>
</div>
</div>
</div>
</div>

