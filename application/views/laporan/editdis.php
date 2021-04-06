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
									<input type="date" class="form-control" required  id="tgl_disposisi" name="tgl_disposisi" placeholder="Masukkan nomor surat"  value="<?= $nomor_surat['tgl_disposisi']; ?>"> 
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
								<label for="tujuan" class="col-sm-3 col-form-label">Tujuan Disposisi</label>
								<div class="col-sm-8">
									<select name="tujuan" required id="tujuan" class="form-control" >
										<option value="">--Select Tujuan Disposisi-- </option>
										<option value="Kepala Dinas">Kepala Dinas</option>
										<option value="Sekertaris">Sekertaris</option>
										<option value="Kepala Bidang Kesmas">Kepala Bidang Kesmas</option>
										<option value="Kepala Bidang Yankes">Kepala Bidang Yankes</option>
										<option value="Kepala Bidang P3KL">Kepala Bidang P3KL</option>
										<option value="Kepala Bidang SDK">Kepala Bidang SDK</option>
										<option value="Ka. UPT Balpelkes">Ka. UPT Balpelkes</option>
										<option value="Ka. UPT BKMM">Ka. UPT BKMM</option>
										<option value="Ka. UPT BLKPK">Ka. UPT BLKPK</option>
										<option value="Ka. UPT AKPER">Ka. UPT AKPER</option>
									</select>
									<?= form_error('klasifikasi','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="keterangan" class="col-sm-3 col-form-label">Isi Disposisi </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" required id="keterangan" name="keterangan" placeholder="Masukkan keterangan"  value="<?= $nomor_surat['keterangan']; ?>">
									<?= form_error('keterangan','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>



							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Simpan</button>
									<a class="btn btn-danger" href="<?=site_url('Laporan/disposisi')?>" role="button">Batal</a>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
