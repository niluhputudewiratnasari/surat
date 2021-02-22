		<section class="contact" id="contact">
			<div class="container">
				<h5>Form Edit Menu</h5>
				<br>

				<div class="row">
					<div class="col-lg-6">
						<form action="<?= site_url('menu/proses_edit') ?>" method="post">
							<input type="hidden" name="id" value="<?= $akun_menu['id']; ?>">
							<div class="form-group">
								<label for="menu">Menu</label>
								<input type="text" name="menu" id="menu" class="form-control" placeholder="Masukkan Menu"  value="<?= $akun_menu['menu']; ?>">
							</div>

							<div class="form-group">
								<button type="submit" name="editmenu" class="btn btn-outline-primary btn-sm">Edit</button>
							</div>

						</form>
					</div>
				</div>
			</section>


