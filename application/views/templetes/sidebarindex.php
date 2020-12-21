<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dinas Kesehatan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- melakukan query dari menu -->  

    <?php  
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT `akun_menu`.`id`, `menu`
    FROM `akun_menu` JOIN `akun_access_menu`
    ON `akun_menu`.`id` = `akun_access_menu`.`menu_id`
    WHERE `akun_access_menu`.`role_id` = $role_id
    ORDER BY `akun_access_menu`.`menu_id` ASC
    ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- looping menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div> 

        <!-- siapkan submenu sesuai menu -->
        <?php  
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
        FROM `akun_sub_menu` JOIN `akun_menu`
        ON `akun_sub_menu`.`menu_id` = `akun_menu`.`id`
        WHERE `akun_sub_menu`.`menu_id` = $menuId
        AND `akun_sub_menu`.`is_active` = 1
        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>


        <?php foreach ($subMenu as $sm) : ?>
            <?php if($title == $sm['title']) : ?>
                <li class="nav-item active">
                    <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>   
                        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>

                    <hr class="sidebar-divider mt-3">

                <?php endforeach; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('masukcontroller/logout'); ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                    </li>


                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Components</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="buttons.html">Buttons</a>
                            <a class="collapse-item" href="cards.html">Cards</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>



        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Chart</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
                <!-- End of Sidebar -->