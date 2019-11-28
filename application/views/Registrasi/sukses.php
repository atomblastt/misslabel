<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<h1><?php echo $title ?></h1><hr>
<br>
<br>
<div class=" pos-relative">
<div class="bgwhite">

  <?php if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  } 
   ?>
   <p class="alert alert-warning">Registrasi Berhasil. <a href="<?php echo base_url('login') ?>" class="btn btn-info btn-sm">Login di sini</a></p>

 </div>
</div>
<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
  
</div>

</div>

</div>
</section>

