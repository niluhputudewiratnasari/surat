   <div class="container-fluid">
   	<h1 class="h3 mb-4 text-gray-800"><br><?= $title; ?></h1>

   	<div class="row">
   		<div class="col-lg-8">

   			<form action="<?= site_url('akun/proses_editakun') ?>" method="post">
          <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

          <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Nama </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required id="name" name="name" placeholder="Masukkan nama"  value="<?= $akun['name']; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required id="email" name="email" placeholder="Masukkan email"  value="<?= $akun['email']; ?>">
            </div>
          </div>
         <!--  <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required id="password" name="password" placeholder="Masukkan password" readonly value="<?= $akun['password']; ?>">
            </div>
          </div> -->

          <div class="row mb-3">
            <label for="role_id" class="col-sm-2 col-form-label">Role </label>
            <div class="col-sm-10">
              <select name="role_id" required id="role_id" class="form-control">
                <option>-- Select Role --</option>
                <?php foreach ($role as $r) : ?>
                  <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" name="editrole" class="btn btn-primary">Simpan</button>
              <a class="btn btn-danger" href="<?=site_url('Akun/dataakun')?>" role="button">Batal</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
