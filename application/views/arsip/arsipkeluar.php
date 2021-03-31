   <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
     <div class="col-lg">
      <?php if(validation_errors()) : ?>
       <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>


    <div class="card">
      <div class="card-body">

        <table id="example1" class="table table-striped mt-3 text-center">
         <thead>
          <tr>
           <th scope="col">#</th>
           <th scope="col">No Arsip </th>
           <th scope="col">Tanggal Arsip Keluar</th>
           <th scope="col">Nomor Surat Keluar</th>
           <th scope="col">Perihal</th>
           <th scope="col">Pengirim</th>
           <th scope="col">Tanggal Surat Keluar</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php $i = 1; ?>
        <?php foreach ($nomor_surat as $arsipkeluar) : ?>
         <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $arsipkeluar['no']; ?></td>
          <td><?= $arsipkeluar['tgl_arsipkeluar']; ?></td>
          <td><?= $arsipkeluar['nomor_surat']; ?></td>
          <td><?= $arsipkeluar['perihal']; ?></td>
          <td><?= $arsipkeluar['kepada']; ?></td>
          <td><?= $arsipkeluar['tgl_surat']; ?></td>
          <td>
            <a href="<?= base_url(); ?>arsip/editark/<?= $arsipkeluar['id_arsipkeluar'];?>" class="badge badge-success">Ubah</a>
            <a href="<?= base_url(); ?>arsip/hapusark/<?= $arsipkeluar['id_arsipkeluar'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
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

