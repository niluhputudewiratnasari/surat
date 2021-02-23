		<section class="contact" id="contact">
			<div class="container">
				<h5>Form Edit Role</h5>
				<br>

				<div class="row">
					<div class="col-lg-6">
						<form action="<?= site_url('admin/proses_editrole') ?>" method="post">
							<input type="hidden" name="id" value="<?= $akun_role['id']; ?>">
							<div class="form-group">
								<label for="role">Role</label>
								<input type="text" name="role" id="role" class="form-control" placeholder="Masukkan Menu"  value="<?= $akun_role['role']; ?>">
							</div>

							<div class="form-group">
								<button type="submit" name="editrole" class="btn btn-outline-primary btn-sm">Edit</button>
							</div>

						</form>
					</div>
				</div>
			</section>


