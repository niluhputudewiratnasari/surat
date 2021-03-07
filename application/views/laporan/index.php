<!DOCTYPE html>
<html>
<head>
  <title>

  </title>
  <style>
    body {
      font-family: calibri;
      font-size: 13px;
    }
    table{
      border-collapse:collapse;
      background:none;
    }
    h3{text-align: center;}
    th, td{border:1px solid #999;}
    th{padding:8px 0;background: none;}
    td{padding:4px 8px;}
  </style>
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/bootstrap.min.css">
</head>
<body>

  <!--  <img src="<?=base_url('assets/dist/img/cop.jpg')?>"><br> -->
  <h5 style="text-align: center;">PEMERINTAH PROVINSI NUSA TENGGARA BARAT</h5>
  <h2 style="text-align: center">DINAS KESEHATAN</h2>

  <p style="text-align: center">Jl. Amir Hamzah No. 103 Telp (0370) 621786
    <br>Mataram 83211
  </p>
  <hr size="30px">
  <br>
  <h5 style="text-align: center;" > LAPORAN SURAT MASUK </h5>
  <!-- <h6 style="text-align: center;">Tanggal <?php echo date("d-m-Y",strtotime($tgl1)) ?> sampai <?php echo date("d-m-Y",strtotime($tgl2)) ?></h6> -->
  <br>
  <div class="container-fluid">


    <div class="row">
     <div class="col-lg">

       


      <form class="form-inline">
        <div class="form-group mb-3">
          <label for="tanggal"> Days: </label>
          <select class="form-control ml-2" name="tanggal">
            <option value="">--Select Days-- </option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
          </select>
        </div>
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

 <!--  <?php 
  if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
  $tanggal = $_GET['tanggal'];
  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
  $bulantahun = $tanggal.$bulan.$tahun;
}else{
$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');
$bulantahun = $tanggal.$bulan.$tahun;
}

?> -->
<br>
<div class="alert alert-info">
  Menampilkan Laporan Surat Masuk Bulan : <span class="font-weight-bold"><?php echo $bulan ?> </span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?> </span>
</div>

<table class="table table-striped mt-3 text-center" style="font-size: 12px;">
 <thead>
  <tr>
   <th scope="col">#</th>
   <th scope="col">Nomor Surat</th>
   <th scope="col">Perihal</th>
   <th scope="col">Kode Klasifikasi</th>
   <th scope="col">Pengirim</th>
   <th scope="col">Tanggal Surat</th>
 </tr>
</thead>
<tbody>
  <?php $i = 1; ?>
  <?php foreach ($nomor_surat as $sms) : ?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $sms->nomor_surat; ?></td>
      <td><?= $sms->perihal; ?></td>
      <td><?= $sms->klasifikasi; ?></td>
      <td><?= $sms->pengirim; ?></td>
      <td><?= $sms->tgl_surat; ?></td>

    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
</tbody>
</table>

</div>
</div>
</body>
</html>