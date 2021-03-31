   <div class="container-fluid">

   	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   	<div class="row">
   		<div class="col-lg">
         <?php if(validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>


        <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newKlasifikasiModal"><i class="fas fa-fw fa-plus"></i> Tambah klasifikasi</a>

        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Klasifikasi</th>
                  <th scope="col">Nama Klasifikasi</th>
                  <th scope="col">Uraian</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1; ?>
               <?php foreach ($klasifikasi as $klas) : ?>
                 <tr>
                   <th scope="row"><?= $i; ?></th>
                   <td><?= $klas['klasifikasi']; ?></td>
                   <td><?= $klas['nama_klasifikasi']; ?></td>
                   <td><?= $klas['uraian']; ?></td>
                   <td>
                    <a href="<?= base_url(); ?>menu/editklasifikasi/<?= $klas['klasifikasi'];?>" class="badge badge-success">Ubah</a>
                    <a href="<?= base_url(); ?>menu/hapusklas/<?= $klas['klasifikasi'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
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
<div class="modal fade" id="newKlasifikasiModal" tabindex="-1" role="dialog" aria-labelledby="newKlasifikasiModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newKlasifikasiModalLabel">Tambah Klasifikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="<?= base_url('menu/klasifikasi'); ?>" method="post">
				<div class="modal-body">
         <div class="form-group">
          <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Kode Klasifikasi">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi" placeholder="Nama Klasifikasi">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Uraian">
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
