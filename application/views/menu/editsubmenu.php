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
									<input type="text" class="form-control" id="title" name="title" vplaceholder="Masukkan Title"  value="<?= $akun_sub_menu['title']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="menu_id" class="col-sm-2 col-form-label">Menu </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="menu_id" name="menu_id" vplaceholder="Masukkan Menu"  value="<?= $akun_sub_menu['menu_id']; ?>" readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="url" class="col-sm-2 col-form-label">Url </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="url" name="url" vplaceholder="Masukkan Url"  value="<?= $akun_sub_menu['url']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="icon" class="col-sm-2 col-form-label">Icon </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="icon" name="icon" vplaceholder="Masukkan Icon"  value="<?= $akun_sub_menu['icon']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="is_active" class="col-sm-2 col-form-label">Active </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="is_active" name="is_active" placeholder="Masukkan Active = 1/ Not Active = 0"  value="<?= $akun_sub_menu['is_active']; ?>">
								</div>
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-10">
									<button type="submit" name="editsubmenu" class="btn btn-primary">Edit</button>
									<a class="btn btn-danger" href="<?=site_url('Menu/submenu')?>" role="button">Cancel</a>
								</div>
							</div>


							<!-- <div class="form-group">
								<label for="menu">Menu :
									<input type="text" name="menu" id="menu" class="form-control" placeholder="Masukkan Menu"  value="<?= $akun_sub_menu['menu']; ?>"></label>
								</div>

								<div class="form-group">
									<button type="submit" name="editmenu" class="btn btn-outline-primary btn-sm">Edit</button>
								</div> -->

							</form>
						</div>
					</div>
				</div>
			</section>
		</div>

