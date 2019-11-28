<?php 
// proteksi halaman 
// $this->simple_login->cek_login();
$this->simple_login->cek_akses_level();
 // gabungan semua bagian layout
 require_once('head.php');
 require_once('header.php');
 require_once('nav.php');
 require_once('content.php');
 require_once('footer.php');