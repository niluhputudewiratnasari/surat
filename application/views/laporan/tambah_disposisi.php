  <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Tambah Disposisi</h1>
    <div class=" container">  
      <div class="card">
        <div class=" card-body"> 
         <div class="row">
          <div class="col-lg-12">

            <?= form_open_multipart('laporan/tambah_disposisi') ;?>
        <!-- <div class="row mb-3">
          <label for="no_urut" class="col-sm-2 col-form-label">Id Disposisi</label>
          <div class="col-sm-10">
            <input type="" class="form-control" id="no_urut" name="no_urut">
          </div>
        </div> -->
        <div class="row mb-3">
          <label for="tgl_disposisi" class="col-sm-2 col-form-label">Tanggal Disposisi</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="tgl_disposisi" name="tgl_disposisi">
            <?= form_error('tgl_disposisi','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nomor_surat" class="col-sm-2 col-form-label">No Surat Masuk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $nomor_surat['nomor_surat']; ?>" readonly>
            <?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $nomor_surat['perihal']; ?>" readonly>
            <?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="tujuan" class="col-sm-2 col-form-label">Tujuan Disposisi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tujuan" name="tujuan">
            <?= form_error('tujuan','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="keterangan" class="col-sm-2 col-form-label">Isi Disposisi</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
            <?= form_error('keterangan','<small class="text-danger pl-3">', '</small>');  ?>
          </div>
        </div>

        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
           <a class="btn btn-primary" href="<?=site_url('Admin/S_k/surat_keluar')?>" role="button">Edit</a>
           <a class="btn btn-danger" href="<?=site_url('Admin/S_k/surat_keluar')?>" role="button">Cancel</a>
         </div>
       </div>

     </form>


   </div>
 </div>

</div>

</div>
</form>
</div>




</div>
</div>
</div>
</div>














