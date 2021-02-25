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
									<input type="text" class="form-control" id="role" name="role" vplaceholder="Masukkan Menu"  value="<?= $akun_role['role']; ?>">
								</div>
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-10">
									<button type="submit" name="editrole" class="btn btn-primary">Edit</button>
								</div>
							</div>

								<!-- <div class="form-group">
									<label for="role">Role :</label>
									<input type="text" name="role" id="role" class="form-control" placeholder="Masukkan Menu"  value="<?= $akun_role['role']; ?>">
								</div> -->
								<!-- <div class="row mb-3">
									<div class="col-lg-12 col-sm-2 col-sm-10">
										<button type="submit" name="editrole" class="btn btn-outline-primary btn-sm">Edit</button>
									</div>
								</div> -->

							</form>
						</div>
					</div>
				</div>
			</section>
		</div>


