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
             <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Disposisi</a>
           </li>

         </ul>
       </div>
       <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            <div class="row">
              <div class="col-7">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm center">
                    <tbody>
                      <tr>
                        <td class="field text-left font-weight-bold">No</td>
                        <td width="5%">:</td>
                        <td class="text-left"><?= $nomor_surat['no_urut']; ?></td>
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
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="col-4">
               <!-- <td><img src="<?php //echo base_url(); ?>assets/photo/<?= $sms['file'];?>" width="64"></td> -->

               <div class="profile-left" align="center">
                <div class="panel-body">
                  <?php 
                  if ($nomor_surat['file'] != '') {
                    $tipe = explode('.', $nomor_surat['file']);
                    if($tipe[1] == 'pdf'){
                      ?>
                      <a href="<?=base_url();?>assets/photo/<?= $nomor_surat['file'];?>"  target="_blank" title="view" class="btn btn-lg btn-info"> Unduh Dokumen
                      </a>
                      <?php 
                    } else {
                      ?>
                      <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newSuratMasukModal"> Tampilkan Dokumen</a>

                      <!-- Modal -->
                      <div class="modal fade" id="newSuratMasukModal" tabindex="-1" role="dialog" aria-labelledby="newSuratMasukModalLabel" aria-hidden="true">
                       <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <img src="<?=base_url();?>assets/photo/<?= $nomor_surat['file'];?>" alt="">
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                } else {
                  echo 'Tidak ada file dokumen';
                }
                ?>

              </div>
            </div>

          </div>
        </div> 
      </div>  

      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
       <div class="row">
        <div class="col-4">
         <?php 
         if ($nomor_surat['status'] != 'Menunggu Disposisi'):
          ?>
          <div class="table-responsive">
            <table class="table table-borderless table-sm">
              <tbody>
                <tr>
                  <td class="field text-left font-weight-bold"><strong>Nomor Surat</strong></td>
                  <td width="5%"><strong>:</strong></td>
                  <td class="text-left"><strong><?= $nomor_surat['nomor_surat']; ?></strong></td>
                </tr>
                <tr>
                  <td class="field text-left font-weight-bold">Tanggal Disposisi</td>
                  <td width="5%">:</td>
                  <td class="text-left"><?= $nomor['tgl_disposisi']; ?></td>
                </tr>
                <tr>
                  <td class="field text-left font-weight-bold">Disposisi Kepada</td>
                  <td width="5%">:</td>
                  <td class="text-left"><?= $nomor['tujuan']; ?></td>
                </tr>
                <tr>
                  <td class="field text-left font-weight-bold">Catatan</td>
                  <td width="5%">:</td>
                  <td class="text-left"><?= $nomor['keterangan']; ?></td>
                </tr>

              </tbody>


            </table>
            <?php 
          endif 
          ?>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.card -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
