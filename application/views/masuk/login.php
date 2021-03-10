    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <i class="fas fa-hospital-user fa-4x mb-4"></i>
                                        <h4 class="h4 text-gray-900 mb-2 font-weight-bold">Aplikasi Pengarsipan Surat</h4>
                                        <h5 class="h5 text-gray-600 mb-1">Dinas Kesehatan Provinsi Nusa Tenggara Barat</h5>
                                        <hr>
                                        <h4 class="h4 text-gray-900 mb-6">Silahkan Login</h4>
                                    </div>
                                    <br>

                                    <?= $this->session->flashdata('message');  ?>

                                    <form class="user" method="post" action="<?= base_url('masukcontroller'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                            id="email" name="email" 
                                            placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                            <?= form_error('email','<small class="text-danger pl-3">', '</small>');  ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                            <?= form_error('password','<small class="text-danger pl-3">', '</small>');  ?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <a class="btn btn-danger btn-user btn-block" href="<?=site_url('Home/index')?>" role="button">Cancel</a>
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('masukcontroller/registration'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

