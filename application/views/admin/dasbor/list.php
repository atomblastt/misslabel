
<div class="box-body">
  <div class="col-md-5">
   <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('<?php echo base_url() ?>assets/admin/dist/img/2.jpg') center center;">
              <h3 class="widget-user-username">Selamat Datang</h3>
              <h5 class="widget-user-desc"><?php echo $this->session->userdata('nama'); ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url() ?>assets/admin/dist/img/avatar5.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">ID</h5>
                    <span class="description-text"><?php echo $this->session->userdata('id_user'); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">NAMA</h5>
                    <span class="description-text"><?php echo $this->session->userdata('nama'); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">AKSES</h5>
                    <span class="description-text"><?php echo $this->session->userdata('akses_level'); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
 <!-- Main content -->
   
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php foreach ($total_produk as $total => $value): ?>
               <h3><?php echo $value; ?> Pcs</h3>
              <?php endforeach;?>

              <p>Total Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/produk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
             <?php foreach ($total_kategori_dasbor as $total_kategori_dasbor): ?>
               <h3><?php echo $total_kategori_dasbor; ?></h3>
              <?php endforeach;?>

              <p>Total Kategori Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="<?php echo base_url('admin/kategori') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php foreach ($total_user as $total_user): ?>
               <h3><?php echo $total_user; ?> User</h3>
              <?php endforeach;?> 

              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('admin/user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
   
  </div>
     