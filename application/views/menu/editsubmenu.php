		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->
				

				<div class="row">
					<div class="col-lg-6">
						<?= form_error('menu','<div class="alert alert-danger" role="alert">
						', '</div>') ?>
						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('menu/proses_editsub') ?>" method="post">
							<input type="hidden" name="id" value="<?= $akun_sub_menu['id']; ?>">

							<div class="row mb-3">
								<label for="title" class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" required id="title" name="title" placeholder="Masukkan Title"  value="<?= $akun_sub_menu['title']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="menu_id" class="col-sm-2 col-form-label">Menu </label>
								<div class="col-sm-10">
									<select name="menu_id" required id="menu_id" class="form-control">
										<option>-- Select Menu --</option>
										<?php foreach ($menu as $m) : ?>
											<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="url" class="col-sm-2 col-form-label">Url </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" required id="url" name="url" placeholder="Masukkan Url"  value="<?= $akun_sub_menu['url']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="icon" class="col-sm-2 col-form-label">Icon </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" required id="icon" name="icon" placeholder="Masukkan Icon"  value="<?= $akun_sub_menu['icon']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="is_active" class="col-sm-2 col-form-label">Active </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" required id="is_active" name="is_active" placeholder="Masukkan Active = 1 / Not Active = 0"  value="<?= $akun_sub_menu['is_active']; ?>">
								</div>
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-10">
									<button type="submit" name="editsubmenu" class="btn btn-primary">Simpan</button>
									<a class="btn btn-danger" href="<?=site_url('Menu/submenu')?>" role="button">Batal</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

