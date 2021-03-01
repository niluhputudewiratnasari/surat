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


    <!-- <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newArsipSMModal">Tambah Arsip Surat Masuk</a> -->

    <div class="card">
      <div class="card-body">

        <table class="table table-striped mt-3 text-center">
         <thead>
          <tr>
           <th scope="col">#</th>
           <th scope="col">No Arsip Keluar</th>
           <th scope="col">Tanggal Arsip Keluar</th>
           <th scope="col">Nomor Surat Keluar</th>
           <th scope="col">Perihal</th>
           <th scope="col">Kepada</th>
           <th scope="col">Tanggal Arsip Keluar</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php $i = 1; ?>
        <?php foreach ($tgl_arsipkeluar as $ak) : ?>
         <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $ak['id_arsipkeluar']; ?></td>
          <td><?= $ak['tgl_arsipkeluar']; ?></td>
          <td><?= $ak['nomor_surat']; ?></td>
          <td><?= $ak['perihal']; ?></td>
          <td><?= $ak['kepada']; ?></td>
          <td><?= $ak['tgl_surat']; ?></td>
          <td>
           <a href="<?= base_url(); ?>arsip/edit/<?= $ak['id_arsipkeluar'];?>" class="badge badge-success">Edit</a>
           <a href="<?= base_url(); ?>arsip/hapus/<?= $ak['id_arsipkeluar'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
           <a href="<?= base_url(); ?>arsip/tambaharsipsk/<?= $ak['id_arsipkeluar'];?>" class="badge badge-warning">Arsipkan</a>
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

