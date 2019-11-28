<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit/'. $user->id_user),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" value="<?php echo $user->nama ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" class="form-control" placeholder="Email Pengguna" name="email" value="<?php echo $user->email ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $user->username ?>" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $user->password ?>" readonlye>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level Akses</label>
  <div class="col-md-2">
   <select name="akses_level" class="form-control">
   	<option value="Admin">Admin</option>
    <option value="Operator"<?php if ($user->akses_level=="Operator") { echo "selected"; } ?>>Operator</option>
   	<option value="User"<?php if ($user->akses_level=="User") { echo "selected"; } ?>>User</option>
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