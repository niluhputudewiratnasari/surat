		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>

				<div class="row">
					<div class="col-lg-6">
						<form action="<?= site_url('admin/proses_editrole') ?>" method="post">
							<input type="hidden" name="id" value="<?= $akun_role['id']; ?>">
							<div class="row mb-3">
								<label for="role" class="col-sm-2 col-form-label">Role </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" required id="role" name="role" placeholder="Masukkan Role"  value="<?= $akun_role['role']; ?>">
								</div>
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-10">
									<button type="submit" name="editrole" class="btn btn-primary">Simpan</button>
									<a class="btn btn-danger" href="<?=site_url('Admin/role')?>" role="button">Batal</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>


