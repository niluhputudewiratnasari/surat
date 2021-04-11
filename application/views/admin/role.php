   <div class="container-fluid">

   	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   	<div class="row">
   		<div class="col-lg">
   			<?= form_error('role','<div class="alert alert-danger" role="alert">
   			', '</div>') ?>
   			<?= $this->session->flashdata('message'); ?>


   			<a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-fw fa-plus"></i> Tambah Role</a>


         <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1; ?>
               <?php foreach ($role as $r) : ?>
                 <tr>
                   <th scope="row"><?= $i; ?></th>
                   <td><?= $r['role']; ?></td>
                   <td>
                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">Akses</a>
                    <a href="<?= base_url(); ?>admin/editrole/<?= $r['id'];?>" class="badge badge-success">Ubah</a>
                    <a href="<?= base_url(); ?>admin/hapus/<?= $r['id'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="<?= base_url('admin/role'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="role" name="role" placeholder="Role">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
