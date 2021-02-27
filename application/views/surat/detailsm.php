 <div class=" container">  
  <div class="row">
    <div class="col-12">
      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">

            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?= $title; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?= $title; ?></a>
            </li>

          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <div class="row">
                <div class="col-5">
                  <div class="table-responsive">
                    <table class="table table-borderless table-sm center">
                      <tbody>
                        <tr>
                          <td class="field text-left font-weight-bold">Id Surat</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['id_suratkeluar']; ?></td>
                        </tr>
                        <tr>
                          <td class="field text-left font-weight-bold">Nomor Surat</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['nomor_surat']; ?></td>
                        </tr>
                        <tr>
                          <td class="field text-left font-weight-bold">Perihal</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['perihal']; ?></td>
                        </tr>
                        <tr>
                          <td class="field text-left font-weight-bold">Klasifikasi</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['klasifikasi']; ?></td>
                        </tr>
                        <tr>
                          <td class="field text-left font-weight-bold">Lampiran</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['lampiran']; ?></td>
                        </tr>

                        <tr>
                          <td class="field text-left font-weight-bold">Pengirim</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['pengirim']; ?></td>
                        </tr>

                        <tr>
                          <td class="field text-left font-weight-bold">Tanggal Surat</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['tgl_surat']; ?></td>
                        </tr>
                        <!-- ===========================================CEK FILE===================================================== -->
                        <tr>
                          <td class="field text-left font-weight-bold">File</td>
                          <td width="5%">:</td>
                          <td class="text-left"><?= $nomor_surat['file']; ?></td>
                        </tr>

                        <!-- <div class="form-group">
                          <label for="exampleFormControlFile1">Input File</label>
                          <input type="file" class="form-control-file" name="file" >
                          <input type="hidden" name="file1" value="<?= $nomor_surat['file']; ?>">
                        </div> -->

                      </tbody>
                    </table>

                  </div>
                </div>
               <!--  <div class="col-4">

                 <div class="profile-left" align="center">
                  <div class="panel-body">
                    <a href="<?=base_url('assets/uploads/'.$isi->file);?>"  target="blank" title="view" class="btn btn-lg btn-white">
                      <i class="fa fa-file fa-4x text-primary"></i>
                    </a>              
                  </div>
                  <div class="m-b-12">
                    <a href="javascript:;" class="btn btn-default btn-block btn-sm"><?=$isi->no_surat; ?></a>
                  </div>
                </div>

              </div> -->
            </div>
            <?php 
            if($this->session->role_id == '1'):
              ?>
              <div class="row"> 
                <div class="col-sm-1">
                  <a class="btn btn-warning" onclick="return confirm('Anda Yakin ingin mengarsipkan surat ?')" href="" role="button">Arsipkan</a>
                </div>
              </div>
            <?php endif ?>
          </div>        

        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
</div>
</div>