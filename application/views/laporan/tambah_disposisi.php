 <div class=" container">  
  <div class="card">
    <div class=" card-body"> 


      <div class="row">
        <div class="col-sm-8">
          <table>
            <tbody>
             <tr>
              <td width="13%">Perihal</td>
              <td width="1%">:</td>
              <td width="86%"><?=$isi->perihal; ?></td>
            </tr>

            <tr>
              <td width="13%">Asal Surat</td>
              <td width="1%">:</td>
              <td width="86%"><?=$isi->pengirim; ?></td>
            </tr>


          </tbody>
        </table>
        <br>
        <form action="<?= site_url('Admin/disposisi/simpan_disposisi/'.$isi->id_surat_masuk)?>"
          method="post"
          enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tanggal Disposisi</label>
            <input type="date" class="form-control" name="tgl">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Disposisi Kepada</label>
            <div class="form-check">
              <input class="form-check-input" name="disposisi[]" type="checkbox" value="Bendahara Pengeluaran" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
               Bendahara Pengeluaran
             </label>
           </div>
           <div class="form-check">
            <input class="form-check-input" name="disposisi[]" type="checkbox" value="Bendahara Barang" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
             Bendahara Barang
           </label>
         </div>
         <div class="form-check">
          <input class="form-check-input" name="disposisi[]" type="checkbox" value="Bendahara Penerima" id="defaultCheck2">
          <label class="form-check-label" for="defaultCheck2">
           Bendahara Penerima
         </label>
       </div>
       <div class="form-check">
        <input class="form-check-input" name="disposisi[]" type="checkbox" value="Pejabat Fungsional" id="defaultCheck2">
        <label class="form-check-label" for="defaultCheck2">
         Pejabat Fungsional
       </label>
     </div>
     <div class="form-check">
      <input class="form-check-input" name="disposisi[]" type="checkbox" value="Kapoksi" id="defaultCheck2">
      <label class="form-check-label" for="defaultCheck2">
       Kapoksi
     </label>
   </div>
   <div class="form-check">
    <input class="form-check-input" name="disposisi[]" type="checkbox" value="TU" id="defaultCheck2">
    <label class="form-check-label" for="defaultCheck2">
     TU
   </label>
 </div>


</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Isi Disposisi</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
</div>


<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
<i class="fas fa-delete"></i>
<a class="btn btn-danger" href="<?=site_url('Admin/S_k/surat_keluar')?>" role="button">Cancel</a>
</form>
</div>




</div>
</div>
</div>
</div>














