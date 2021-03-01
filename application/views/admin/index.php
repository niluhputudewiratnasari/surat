<div class="container-fluid">
   <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                     Surat Masuk</div>

                     <h3><?php 
                     $this->db->like('id_suratmasuk');
                     $this->db->from('surat_masuk');
                     echo $this->db->count_all_results();
                     ?></h3>
                  </div>
                  <a href="<?=site_url('Surat/index');?>" class="btn btn-outline-primary">Open</a>
               </div>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                     Surat Keluar</div>
                     <h3><?php 
                     $this->db->like('id_suratkeluar', '');
                     $this->db->from('surat_keluar');
                     echo $this->db->count_all_results();
                     ?></h3>
                  </div>
                  <a href="<?=site_url('Surat/suratkeluar')?>" class="btn btn-outline-info">Open</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

