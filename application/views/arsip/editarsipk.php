		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->


				<div class="row">
					<div class="col-lg">
						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('arsip/proses_editark') ?>" method="post">
							<input type="hidden" name="id_arsipkeluar" value="<?= $nomor_surat['id_arsipkeluar']; ?>">

							<div class="row mb-3">
								<label for="no" class="col-sm-3 col-form-label">No. Urut</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="no" name="no"  value="<?= $nomor_surat['no']; ?>" readonly> 
									<?= form_error('no','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="tgl_arsipkeluar" class="col-sm-3 col-form-label">Tanggal Arsip Keluar</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="tgl_arsipkeluar" name="tgl_arsipkeluar" placeholder="Masukkan Tanggal Arsip Masuk"  value="<?= $nomor_surat['tgl_arsipkeluar']; ?>"> 
									<?= form_error('tgl_arsipkeluar','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<input type="hidden" name="id_suratkeluar" value="<?= $nomor_surat['id_suratkeluar']; ?>">

							<div class="row mb-3">
								<label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nomor_surat" name="nomor_surat"  value="<?= $nomor_surat['nomor_surat']; ?>" readonly>
									<?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $nomor_surat['perihal']; ?>" readonly>

									<?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="kepada" class="col-sm-3 col-form-label">Kepada </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="kepada" name="kepada" value="<?= $nomor_surat['kepada']; ?>" readonly>
									<?= form_error('kepada','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="tgl_surat" class="col-sm-3 col-form-label"> Tanggal Surat Masuk </label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="tgl_surat" name="tgl_surat"  value="<?= $nomor_surat['tgl_surat']; ?>" readonly>
									<?= form_error('tgl_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>



							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Edit</button>
									<a class="btn btn-danger" href="<?=site_url('Arsip/arsipkeluar')?>" role="button">Cancel</a>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
