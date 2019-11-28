<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a ><h5 class="m-text20 p-b-24">
          <?php echo $title ?>
        </h5>
  </div>
  <!-- /.login-logo -->
  <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
    <p class="login-box-msg"><b>Masukan Email & Password Untuk Melanjutkan</b></p>
<?php 
// notifikasi error
echo validation_errors('<div class="alert alert-success">','</div>');
// notifikasi gagal login
if ($this->session->flashdata('warning')) {
  echo '<div class="alert alert-warning">';
  echo $this->session->flashdata('warning');
  echo '</div>';
}
// notifikasi logout
if ($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
// form open login
echo form_open(base_url('login/pelanggan'));
 ?>

            <div class="bo4 of-hidden size15 m-b-20">
              <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="email" placeholder="Email">
              <span class="glyphicon glyphicon-email form-control-feedback"></span>
            </div>

            <div class="bo4 of-hidden size15 m-b-20">
              <input type="password" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="password" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>


      <!-- <div class="form-group has-feedback"> -->
        <!-- <input type="text" name="username" class="form-control" placeholder="Username"> -->
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      <!-- </div> -->
      <!-- <div class="form-group has-feedback"> -->
        <!-- <input type="password" name="password" class="form-control" placeholder="Password"> -->
        <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      <!-- </div> -->
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
      <p> ------------------------------------------------</p>
      <!-- registrasi -->
        <a href="<?php echo base_url('registrasi') ?>" class="text-center">Silahkan registrasi jika belum ada Username & Password</a>
  <?php echo form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
