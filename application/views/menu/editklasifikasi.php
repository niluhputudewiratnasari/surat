		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->
				

				<div class="row">
					<div class="col-lg-8">

						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('menu/proses_editklasifikasi') ?>" method="post">

							<div class="row mb-3">
								<label for="klasifikasi" class="col-sm-3 col-form-label">Kode Klasifikasi </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Masukkan Klasifikasi"  value="<?= $kode_klasifikasi['klasifikasi']; ?>" readonly> 
									<?= form_error('klasifikasi','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							
							<div class="row mb-3">
								<label for="nama_klasifikasi" class="col-sm-3 col-form-label">Nama Klasifikasi </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi" placeholder="Masukkan Nama Klasifikasi"  value="<?= $kode_klasifikasi['nama_klasifikasi']; ?>"> 
									<?= form_error('nama_klasifikasi','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							<div class="row mb-3">
								<label for="uraian" class="col-sm-3 col-form-label">Uraian </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="uraian" name="uraian" placeholder="Masukkan Uraian"  value="<?= $kode_klasifikasi['uraian']; ?>">
									<?= form_error('uraian','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Edit</button>
									<a class="btn btn-danger" href="<?=site_url('Menu/klasifikasi')?>" role="button">Cancel</a>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

