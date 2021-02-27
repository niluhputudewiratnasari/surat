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


      <?php
      if($this->session->role_id == '1'):
        ?>
        <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newDisSuratMasukModal"><i class="fas fa-fw fa-plus"></i> Tambah Disposisi Surat Masuk</a>
        <br>
        <?php 
      endif
      ?>

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
           <th scope="col">#</th>
           <th scope="col">Tanggal Surat</th>
           <th scope="col">Nomor Surat Masuk</th>
           <th scope="col">Tujuan Disposisi</th>
           <th scope="col">Isi Disposisi</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php $i = 1; ?>
        <?php foreach ($disposisi as $dis) : ?>
         <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $dis['tgl_disposisi']; ?></td>
          <td><?= $dis['nomor_surat']; ?></td>
          <td><?= $dis['tujuan']; ?></td>
          <td><?= $dis['keterangan']; ?></td>
          <td>
            <a href="<?= base_url(); ?>surat/editsm/<?= $dis['id_suratmasuk'];?>" class="badge badge-success">Edit</a>
            <a href="<?= base_url(); ?>surat/hapus/<?= $dis['id_suratmasuk'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newDisSuratMasukModal" tabindex="-1" role="dialog" aria-labelledby="newDisSuratMasukModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="newDisSuratMasukModalLabel">Tambah Disposisi Surat Masuk</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <form action="<?= base_url('laporan/disposisi'); ?>" method="post">
    <div class="modal-body">
     <div class="form-group">
      <input type="text" class="form-control" id="tgl_disposisi" name="tgl_disposisi" placeholder="Tanggal Disposisi">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
    </div>

    <div class="form-group">
      <select name="tujuan" id="tujuan" class="form-control">
       <option value="">--Pilih Tujuan Disposisi--</option>
       <option value="TU">TU</option>
       <option value="Bendahara">Bendahara</option>
     </select>
   </div>
   <div class="form-group">
     <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add</button>
  </div>

</form>
</div>
</div>
</div>
