<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" class="form-control" placeholder="Email Pengguna" name="email" value="<?php echo set_value('email') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level Akses</label>
  <div class="col-md-2">
   <select name="akses_level" class="form-control">
   	<option value="Admin">Admin</option>
   	<option value="Operator">Operator</option>
    <option value="User">User</option>
   </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit">
  		<i class="fa fa-save"></i>Simpan
  	</button>
  	<button class="btn btn-info btn-lg" name="reset" type="reset">
  		<i class="fa fa-times"></i>Reset
  	</button>
  </div>
</div>

<?php echo form_close(); ?>