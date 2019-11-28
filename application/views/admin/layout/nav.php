<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Menu Dashboard -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

        <!-- menu produk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i>Data produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i>Tambah produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i>Kategori produk</a></li>
          </ul>
        </li>

        <?php if ($this->session->userdata('akses_level') === 'Admin'): ?>
        <!-- menu user -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i>Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i>Tambah Pengguna</a></li>
          </ul>
        </li>
        <?php endif ?>

        <!-- menu konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i>Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i>Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i>Konfigurasi Icon</a></li>
          </ul>
        </li>

        <!-- menu konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/kasir') ?>"><i class="fa fa-money"></i> <span>Kasir</span></a></li>
            <li><a href="<?php echo base_url('admin/report') ?>"><i class="fa fa-book"></i> <span>Laporan Penjualan</span></a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('home') ?>" target="_blank"><i class="fa fa-home"></i> <span>Home Website</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
