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


    <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newSubmenuModal"><i class="fas fa-fw fa-plus"></i> Add New Submenu</a>
    
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
     <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
      aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-info" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form> -->

  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-striped">
       <thead>
        <tr>
         <th scope="col">#</th>
         <th scope="col">Title</th>
         <th scope="col">Menu</th>
         <th scope="col">Url</th>
         <th scope="col">Icon</th>
         <th scope="col">Active</th>
         <th scope="col">Action</th>
       </tr>
     </thead>
     <tbody>
       <?php $i = 1; ?>
       <?php foreach ($subMenu as $sm) : ?>
        <tr>
         <th scope="row"><?= $i; ?></th>
         <td><?= $sm['title']; ?></td>
         <td><?= $sm['menu']; ?></td>
         <td><?= $sm['url']; ?></td>
         <td><?= $sm['icon']; ?></td>
         <td><?= $sm['is_active']; ?></td>
         <td>
          <a href="<?= base_url(); ?>menu/editSub/<?= $sm['id'];?>" class="badge badge-success">Edit</a>
          <a href="<?= base_url(); ?>menu/hapussub/<?= $sm['id'];?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
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
<!-- /.container-fluid -->

</div>

<!-- Modal -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubmenuModalLabel">Add New Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="<?= base_url('menu/submenu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
         </div>
         <div class="form-group">
           <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Select menu</option>
            <?php foreach ($menu as $m) : ?>
             <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu Url">
       </div>
       <div class="form-group">
         <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
       </div>
       <div class="form_group">
         <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
          <label class="form-check-label" for="is_active">
            Active?
          </label>
        </div>
      </div>
    </div>

    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Add</button>
   </div>
 </form>
</div>
</div>
</div>
