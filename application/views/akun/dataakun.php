   <div class="container-fluid">

   	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   	<div class="row">
   		<div class="col-lg">
   			<?= $this->session->flashdata('message'); ?>


        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-striped mt-3  text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1; ?>
               <?php foreach ($akun as $aku) : ?>
                <tr>
                 <th scope="row"><?= $i; ?></th>
                 <td><?= $aku['name']; ?></td>
                 <td><?= $aku['email']; ?></td>
                 <td><?= $aku['role']; ?></td>
                 <td>
                   <a href="<?= base_url(); ?>akun/editakun/<?= $aku['id_akun'];?>" class="badge badge-success">Ubah</a>
                   <a href="<?= base_url(); ?>akun/hapus/<?= $aku['id_akun'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
                 </td>
               </tr>
               <?php $i++; ?>
             <?php endforeach; ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
