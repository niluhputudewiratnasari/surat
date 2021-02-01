   <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
     <div class="col-lg">

      <div class="card mb-3">
        <div class="card-header bg-info text-dark">Filter Laporan Surat Masuk</div>
        <div class="card-body">
          <form class="form-inline">
            <div class="form-group mb-3">
              <label for="bulan"> Month : </label>
              <select class="form-control ml-2" name="bulan">
                <option value="">--Select Month-- </option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>
            <div class="form-group mb-3 ml-3">
              <label for="tahun"> Years : </label>
              <select class="form-control ml-2" name="tahun">
                <option value="">--Select Years-- 
                </option>
                <?php $tahun = date('Y');
                for($i=2020;$i<$tahun+5;$i++) {?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php }?>
              </select>
            </div>

            <button type="submit" class="btn btn-primary mb-3 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
          </form>
        </div>
      </div>

      <?php 
      if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
      }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
      }

      ?>

      <div class="alert alert-info">
        Menampilkan Laporan Surat Masuk Bulan : <span class="font-weight-bold"><?php echo $bulan ?> </span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?> </span>
      </div>

      <table class="table table-striped mt-3">
       <thead>
        <tr>
         <th scope="col">#</th>
         <th scope="col">Nomor Surat</th>
         <th scope="col">Perihal</th>
         <th scope="col">Kode Klasifikasi</th>
         <th scope="col">Lampiran</th>
         <th scope="col">Pengirim</th>
         <th scope="col">Tanggal Surat</th>
       </tr>
     </thead>
     <tbody>
      <?php $i = 1; ?>
      <?php foreach ($nomor_surat as $smak) : ?>
       <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $smak->nomor_surat ?></td>
        <td><?= $smak->perihal ?></td>
        <td><?= $smak->klasifikasi ?></td>
        <td><?= $smak->lampiran ?></td>
        <td><?= $smak->pengirim ?></td>
        <td><?= $smak->tgl_surat ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
</div>
</div>
</div>