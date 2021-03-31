   <div class="container-fluid">

   	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   	<div class="row">
   		<div class="col-lg">
   			<?= form_error('menu','<div class="alert alert-danger" role="alert">
   			', '</div>') ?>
   			<?= $this->session->flashdata('message'); ?>

        <?php
        if($this->session->role_id == '1'):
          ?>
          <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i> Tambah Menu </a>
          <br>
          <?php 
        endif
        ?>
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-striped mt-3  text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1; ?>
               <?php foreach ($menu as $m) : ?>
                 <tr>
                   <th scope="row"><?= $i; ?></th>
                   <td><?= $m['menu']; ?></td>
                   <td>
                     <a href="<?= base_url(); ?>menu/edit/<?= $m['id'];?>" class="badge badge-success">Ubah</a>
                     <a href="<?= base_url(); ?>menu/hapus/<?= $m['id'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
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
 </div>
</div>
<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="<?= base_url('menu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
