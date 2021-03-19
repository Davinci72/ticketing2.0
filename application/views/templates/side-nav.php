<!-- Navigation Bar-->
<header id="topnav">

<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="#" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">
                        <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a> -->
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?=base_url('temp/assets/images/users/avatar-1.jpg')?>" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                    <?php $user_data = $this->session->all_userdata(); ?>
                    <?=$user_data["username"]?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-account-circle-line"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-settings-3-line"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-wallet-line"></i>
                        <span>My Wallet <span class="badge badge-success float-right">3</span> </span>
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a href="<?=base_url('auth/logout')?>" class="dropdown-item notify-item">
                        <i class="remixicon-logout-box-line"></i>
                        <span>Logout</span>
                    </a>
 
                </div>
            </li>            

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center">
                <span class="logo-lg">
                    <img src="<?=base_url('temp/assets/images/logo-light.png')?>" alt="" height="20">
                    <!-- <span class="logo-lg-text-light">Xeria</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">X</span> -->
                    <img src="assets/images/logo-sm.png" alt="" height="24">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Create New
                    <i class="mdi mdi-chevron-down"></i> 
                </a>
                <div class="dropdown-menu">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="fe-briefcase mr-1"></i>
                        <span>New Projects</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="fe-user mr-1"></i>
                        <span>Create Users</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="fe-bar-chart-line- mr-1"></i>
                        <span>Revenue Report</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="fe-headphones mr-1"></i>
                        <span>Help & Support</span>
                    </a>

                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->

<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="#">
                        <i class="fas fa-mail-bulk"></i>Stock / Inventory </a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="<?=base_url('Stock/newProductName')?>"><i class="fab fa-facebook-messenger mr-1"></i> Create Product Name </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Stock/newSkuName')?>"><i class="fab fa-weixin mr-1"></i> Create SKU </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Stock/newProductTypeName')?>"><i class="fas fa-object-group mr-1"></i> Create Product Types  </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Stock/newStock')?>"><i class="fas fa-file-export mr-1"></i> Add New Stock </a>
                            </li>
                        </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="remixicon-dashboard-line"></i>Sales Management <div class="arrow-down"></div></a>
                        <ul class="submenu">
                        <li class="has-submenu">
                                <a href="<?=base_url('Sales/newSale')?>"><i class="fab fa-facebook-messenger mr-1"></i> New Sale </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Sales/newCreditSale')?>"><i class="fab fa-facebook-messenger mr-1"></i> New Credit Sale </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Sales/viewHistory')?>"><i class="fab fa-facebook-messenger mr-1"></i>View Sales History </a>
                            </li>
                        </ul>
                </li>

                <li class="has-submenu">
                    <a href="#">
                        <i class="remixicon-stack-line"></i>Client Management <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                            <li class="has-submenu">
                                <a href="<?=base_url('Clients/newClients')?>"><i class="fab fa-facebook-messenger mr-1"></i>Add New Client </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Clients/creditPayment')?>"><i class="fab fa-weixin mr-1"></i> Credit Payment </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('Clients/pendingPayments')?>"><i class="fab fa-facebook-messenger mr-1"></i> Pending Payments </a>
                            </li>
                        </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"> <i class="remixicon-briefcase-5-line"></i>My Payments <div class="arrow-down"></div></a>
                    <ul class="submenu">
                            <li class="has-submenu">
                                <a href="<?=base_url('senders/sendersList')?>"><i class="fab fa-facebook-messenger mr-1"></i> Mpesa Transactions </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('senders/sendersList')?>"><i class="fab fa-facebook-messenger mr-1"></i> Cash Sales </a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?=base_url('senders/sendersList')?>"><i class="fab fa-facebook-messenger mr-1"></i> Reports </a>
                            </li>
                        </ul>
                </li>

                <!-- <li class="has-submenu">
                    <a href="#">
                        <i class="remixicon-honour-line"></i>Components <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#"><i class="fe-anchor mr-1"></i> Admin UI <div class="arrow-down"></div></a>
                        </li>
                        <li>
                            <a href="widgets.html"><i class="fe-aperture mr-1"></i> Widgets </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="fe-bookmark mr-1"></i> Forms <div class="arrow-down"></div></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="fe-grid mr-1"></i> Tables <div class="arrow-down"></div></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="fe-bar-chart-2 mr-1"></i> Charts <div class="arrow-down"></div></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="fe-cpu mr-1"></i> Icons <div class="arrow-down"></div></a>
                            
                        </li>
                    </ul>
                </li> -->
            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->

</header>
<!-- End Navigation Bar-->

<!-- reference thread id THREAD ID: 1-33V0M7KF  number -->
<!-- 7053271 sunday -->
<!-- transquip limited -->