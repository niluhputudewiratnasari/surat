	<section class="contact" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<?php foreach ($menu as $m) { ?>
					<form action="<?= base_url(). 'menu/proses_edit'; ?>" method="post">
						<div class="form-group">
							<label for="menu">Menu</label>
							<input type="hidden" name="id" value="<?= $m->id;?>">
							<input input type="text" name="menu" id="menu" class="form-control" placeholder="Masukkan NIM" value="<?= $m->menu;?>">
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
