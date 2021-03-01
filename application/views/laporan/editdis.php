		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->


				<div class="row">
					<div class="col-lg">
						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('laporan/proses_editdis') ?>" method="post">
							<input type="hidden" name="id_disposisi" value="<?= $nomor_surat['id_disposisi']; ?>">
							<div class="row mb-3">
								<label for="tgl_disposisi" class="col-sm-3 col-form-label">Tanggal Disposisi</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="tgl_disposisi" name="tgl_disposisi" placeholder="Masukkan nomor surat"  value="<?= $nomor_surat['tgl_disposisi']; ?>"> 
									<?= form_error('tgl_disposisi','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<input type="hidden" name="id_suratmasuk" value="<?= $nomor_surat['id_suratmasuk']; ?>">

							<div class="row mb-3">
								<label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan nomor_surat"  value="<?= $nomor_surat['nomor_surat']; ?>" readonly>
									<?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan perihal"  value="<?= $nomor_surat['perihal']; ?>" readonly>

									<?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="tujuan" class="col-sm-3 col-form-label">Tujuan Disposisi </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan"  value="<?= $nomor_surat['tujuan']; ?>">
									<?= form_error('tujuan','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="keterangan" class="col-sm-3 col-form-label">Isi Disposisi </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan"  value="<?= $nomor_surat['keterangan']; ?>">
									<?= form_error('keterangan','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>



							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Edit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
