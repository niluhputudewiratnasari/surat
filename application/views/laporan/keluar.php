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

  <h5 style="text-align: center;" > LAPORAN SURAT KELUAR </h5>
  <!-- <h6 style="text-align: center;">Tanggal <?php echo date("d-m-Y",strtotime($tgl1)) ?> sampai <?php echo date("d-m-Y",strtotime($tgl2)) ?></h6> -->
  <br>
  <div class="container-fluid">


    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <h5 class="card-header">Fillter By Tanggal</h5>
          <div class="card-body">
            <form action="<?= base_url(); ?>laporan/filter1" method="POST" target='_blank'>

              <input type="hidden" name="nilaifilter" value="1">

              <div class="row">
                <label for="tanggalawal" class="col-sm-5 col-form-label"> Tanggal Awal </label>
                <div class="col-sm-3">
                 <!--  Tanggal Awal <br> -->
                 <input type="date" name="tanggalawal" required="">
               </div>
             </div>

             <div class="row">
              <label for="tanggalakhir" class="col-sm-5 col-form-label"> Tanggal Akhir </label>
              <div class="col-sm-3">
               <!--  Tanggal Awal <br> -->
               <input type="date" name="tanggalakhir" required="">
             </div>
           </div>
           <div class="form-group row justify-content-end">
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Print</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-lg-6">

    <div class="card">
      <h5 class="card-header">Fillter By Bulan</h5>
      <div class="card-body">
        <form action="<?= base_url(); ?>laporan/filter1" method="POST" target='_blank'>

          <input type="hidden" name="nilaifilter" value="2">

          <div class="form-group">
            <label for="tahun1"> Years : </label>
            <select class="form-control ml-2" name="tahun1" required="">
             <?php foreach ($tahun as $bl) : ?>
               <option value="">--Select Years-- </option>
               <option value="<?php echo $bl->tahun ?>"><?php echo $bl->tahun ?></option>

             <?php endforeach; ?>
           </select>
         </div>

         <div class="form-group">
          <label for="bulanawal"> First Month : </label>
          <select class="form-control ml-2" name="bulanawal" required="">
            <option value="">--Select Month-- </option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>

        <div class="form-group mb-3">
          <label for="bulanakhir"> Last Month : </label>
          <select class="form-control ml-2" name="bulanakhir" required="">
            <option value="">--Select Month-- </option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>

        <div class="form-group row justify-content-end">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Print</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<br>

<div class="row">
  <div class="col-lg-6">

    <div class="card">
      <h5 class="card-header">Fillter By Tahun</h5>
      <div class="card-body">
        <form action="<?= base_url(); ?>laporan/filter1" method="POST" target='_blank'>

          <input type="hidden" name="nilaifilter" value="3">

          <div class="form-group">
            <label for="tahun2"> Years : </label>
            <select class="form-control ml-2" name="tahun2" required="">
             <?php foreach ($tahun as $bl) : ?>
               <option value="">--Select Years-- </option>
               <option value="<?php echo $bl->tahun ?>"><?php echo $bl->tahun ?></option>

             <?php endforeach; ?>
           </select>
         </div>

         <div class="form-group row justify-content-end">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Print</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


</body>
</html>