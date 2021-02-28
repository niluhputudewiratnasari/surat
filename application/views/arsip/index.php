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
           <th scope="col">No Arsip</th>
           <th scope="col">Tanggal Arsip Masuk</th>
           <th scope="col">Nomor Surat Masuk</th>
           <th scope="col">Perihal</th>
           <th scope="col">Pengirim</th>
           <th scope="col">Tanggal Arsip Masuk</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php $i = 1; ?>
        <?php foreach ($tgl_arsipmasuk as $am) : ?>
         <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $am['id_arsipmasuk']; ?></td>
          <td><?= $am['tgl_arsipmasuk']; ?></td>
          <td><?= $am['nomor_surat']; ?></td>
          <td><?= $am['perihal']; ?></td>
          <td><?= $am['pengirim']; ?></td>
          <td><?= $am['tgl_surat']; ?></td>
          <td>
           <a href="<?= base_url(); ?>arsip/edit/<?= $am['id_arsipmasuk'];?>" class="badge badge-success">Edit</a>
           <a href="<?= base_url(); ?>arsip/hapus/<?= $am['id_arsipmasuk'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
           <a href="<?= base_url(); ?>arsip/tambaharsipsm/<?= $am['id_arsipmasuk'];?>" class="badge badge-warning">Arsipkan</a>
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

