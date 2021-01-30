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


        <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newArsipSMModal">Tambah Arsip Surat Masuk</a>

        <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Tanggal Arsip Masuk</th>
               <th scope="col">Nomor Surat Masuk</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tgl_arsipmasuk as $am) : ?>
               <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $am['tgl_arsipmasuk']; ?></td>
                  <td><?= $am['nomor_surat']; ?></td>
                  <td>
                     <a href="<?= base_url(); ?>arsip/edit/<?= $am['id_arsipmasuk'];?>" class="badge badge-success">Edit</a>
                     <a href="<?= base_url(); ?>arsip/hapus/<?= $am['id_arsipmasuk'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
                     <a href="" class="badge badge-warning">Arsipkan</a>
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
<!-- Modal -->
<div class="modal fade" id="newArsipSMModal" tabindex="-1" role="dialog" aria-labelledby="newArsipSMModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newArsipSMModalLabel">Tambah Arsip Surat Masuk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <form action="<?= base_url('arsip'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="date" class="form-control" id="tgl_arsipmasuk" name="tgl_arsipmasuk" placeholder="Tanggal Arsip Masuk">
               </div>

               <div class="form-group">
                  <select name="nomor_surat" id="nomor_surat" class="form-control">
                     <option value="">Select Nomor Surat Masuk</option>
                     <?php foreach ($nomor_surat as $sms) : ?>
                        <option value="<?= $sms['nomor_surat']; ?>"><?= $sms['nomor_surat']; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add</button>
               </div>

            </form>
         </div>
      </div>
   </div>
