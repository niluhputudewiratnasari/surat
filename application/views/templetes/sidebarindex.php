<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hospital-alt"></i>
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


                    
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->