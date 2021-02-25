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
      <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newSuratKeluarModal"><i class="fas fa-fw fa-plus"></i> Tambah Surat Keluar</a>
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
        <th scope="col">Nomor Surat</th>
        <th scope="col">Perihal</th>
        <th scope="col">Kode Klasifikasi</th>
        <th scope="col">Lampiran</th>
        <th scope="col">Kepada</th>
        <th scope="col">Tanggal Surat</th>
        <th scope="col">File</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $i = 1; ?>
     <?php foreach ($nomor_surat as $sk) : ?>
      <tr>
       <th scope="row"><?= $i; ?></th>
       <td><?= $sk['nomor_surat']; ?></td>
       <td><?= $sk['perihal']; ?></td>
       <td><?= $sk['klasifikasi']; ?></td>
       <td><?= $sk['lampiran']; ?></td>
       <td><?= $sk['kepada']; ?></td>
       <td><?= $sk['tgl_surat']; ?></td>
       <td><?= $sk['file']; ?></td>
       <td>
        <a href="" class="badge badge-primary">Detail</a>
        <?php
        if($this->session->role_id == '1'):
          ?>
          <a href="<?= base_url(); ?>surat/editk/<?= $sk['id_suratkeluar'];?>" class="badge badge-success">Edit</a>
          <a href="<?= base_url(); ?>surat/hapussk/<?= $sk['id_suratkeluar'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
          <a href="" class="badge badge-warning">Arsipkan</a>
          <?php 
        endif
        ?>
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
</div>
<!-- Modal -->
<div class="modal fade" id="newSuratKeluarModal" tabindex="-1" role="dialog" aria-labelledby="newSuratKeluarModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="newSuratKeluarModalLabel">Tambah Surat Keluar</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <form action="<?= base_url('surat/suratkeluar'); ?>" method="post">
    <div class="modal-body">
     <div class="form-group">
      <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal">
    </div>

    <div class="form-group">
      <select name="klasifikasi" id="klasifikasi" class="form-control">
       <option value="">Select Kode Klasifikasi</option>
       <?php foreach ($klasifikasi as $klas) : ?>
        <option value="<?= $klas['klasifikasi']; ?>"><?= $klas['klasifikasi']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="lampiran" name="lampiran" placeholder="Lampiran">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="kepada" name="kepada" placeholder="Kepada">
  </div>
  <div class="form-group">
    <input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="file" name="file" placeholder="File">
  </div>
               <!-- <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <label class="custom-file-label" for="file">Choose file</label>
                </div> -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>

              </form>
            </div>
          </div>
        </div>
