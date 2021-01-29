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


          <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newSuratMasukModal">Tambah Surat Masuk</a>

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
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($nomor_surat as $sms) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $sms['nomor_surat']; ?></td>
                     <td><?= $sms['perihal']; ?></td>
                     <td><?= $sms['klasifikasi']; ?></td>
                     <td><?= $sms['lampiran']; ?></td>
                     <td><?= $sms['pengirim']; ?></td>
                     <td><?= $sms['tgl_surat']; ?></td>
                     <td><?= $sms['status']; ?></td>
                     <td><?= $sms['file']; ?>
                     <a href="<?= base_url(); ?>surat/edit/<?= $sms['id_suratmasuk'];?>" class="badge badge-success">Edit</a>
                     <a href="<?= base_url(); ?>surat/hapus/<?= $sms['id_suratmasuk'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
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
<div class="modal fade" id="newSuratMasukModal" tabindex="-1" role="dialog" aria-labelledby="newSuratMasukModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newSuratMasukModalLabel">Tambah Surat Masuk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <form action="<?= base_url('surat'); ?>" method="post">
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
                  <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="pengirim">
               </div>
               <div class="form-group">
                  <input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
               </div>
               <div class="form-group">
                  <select name="status" id="status" class="form-control">
                     <?php foreach ($nomor_surat as $sms) : ?>
                        <option value="<?= $sms['status']; ?>"><?= $sms['status']; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <!-- <div class="form-group">
                  <input type="text" class="form-control" id="status" name="status" placeholder="Status">
               </div> -->
               <div class="form-group">
                  <input type="text" class="form-control" id="file" name="file" placeholder="Status">
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
