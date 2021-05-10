<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Milestone Imani Prima</title>

    <!-- vendor css -->
    <link href="<?= base_url('assets/template') ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/lada_button/lada.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/iziToast-master/dist/css/iziToast.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/css/bracket.css">
    <script src="<?= base_url('assets/template') ?>/lib/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/datatables/jquery.dataTables.js"></script>
    <?php
        $segment_1 = $this->uri->segment(1);
        $segment_2 = $this->uri->segment(2);
        if(!isset($this->session->userdata['userdata'])){
          header('location:'.base_url('login'));
        }
    ?>
  </head>
  <body>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo">
        <a href=""><span>[</span>MILESTONE IP<span>]</span></a>
    </div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20 tx-info op-9">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="<?= base_url('dashboard') ?>" class="br-menu-link <?php if($segment_1 == 'dashboard') echo 'active show-sub'?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-home tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="#" class="br-menu-link <?php if($segment_1 == 'c_milestone') echo 'active show-sub' ?>">
          <div class="br-menu-item tx-center">
            <i class="menu-item-icon icon ion-filing tx-24"></i>
            <span class="menu-item-label">Milestone</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="<?= base_url('c_milestone/sales_marketing') ?>" class="nav-link  <?php if($segment_2 == 'sales_marketing') echo 'active show-sub' ?>">Sales & Marketing</a></li>
          <li class="nav-item"><a href="<?= base_url('c_milestone/development') ?>" class="nav-link <?php if($segment_2 == 'development') echo 'active show-sub' ?>">Development</a></li>
          <li class="nav-item"><a href="<?= base_url('c_milestone/operational') ?>" class="nav-link <?php if($segment_2 == 'operational') echo 'active show-sub' ?>">Operational</a></li>
        </ul>
        <a href="<?= base_url('status') ?>" class="br-menu-link <?php if($segment_1 == 'status') echo 'active show-sub' ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-eye tx-22"></i>
            <span class="menu-item-label">Status Milestone</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <label class="sidebar-label pd-x-15 mg-t-20 tx-info op-9">ADMINISTRATOR</label>
        <a href="#" class="br-menu-link <?php if($segment_1 == 'c_master') echo 'active show-sub' ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon ion-document-text tx-20"></i>
            <span class="menu-item-label">Data Master</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="<?= base_url('c_master/name_code') ?>" class="nav-link <?php if($segment_2 == 'name_code') echo 'active show-sub' ?>">Name Code TL</a></li>
          <li class="nav-item"><a href="<?= base_url('c_master/project') ?>" class="nav-link <?php if($segment_2 == 'project') echo 'active show-sub' ?>">Project</a></li>
        </ul>
        <a href="<?= base_url('users') ?>" class="br-menu-link <?php if($segment_1 == 'users') echo 'active show-sub' ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
            <span class="menu-item-label">Users</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
      </div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?= ucfirst($this->session->userdata['userdata']['username']); ?></span>
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href="<?= base_url('login/logout') ?>"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->
